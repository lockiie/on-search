<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Http\Response;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }
        $users = $query->paginate(25);

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $user = new User;
            $user->fill($request->validated());
            $user->save();
            return new UserResource($user);

        } catch (\Exception $exception) {
            if (var_dump(property_exists($exception, "getMessage"))){
                throw new HttpException(400, "Dados inválidos- {$exception->getMessage}"); 
            }else{
                throw new HttpException(400, "Dados inválidos- {$exception}");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);

        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "ID inválido");
        }
        $user = User::findOrfail($id);
        try {
           $user->fill($request->validated())->save();

           return new UserResource($user);

        } catch (\Exception $exception) {
            if (var_dump(property_exists($exception, "getMessage"))){
                throw new HttpException(400, "Dados inválidos- {$exception->getMessage}"); 
            }else{
                throw new HttpException(400, "Dados inválidos- {$exception}");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
