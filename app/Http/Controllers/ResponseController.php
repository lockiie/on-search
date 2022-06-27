<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response as ResponseModel;
use App\Http\Resources\ResponseResource;
use App\Http\Requests\ResponseRequest;
use Exception;
use Illuminate\Http\Response as ReponseHttp;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ResponseModel::query();
        $query->select('alternatives.description as alternative', 'user_id', 'users.name as user', 'comment', 
                       'alternative_id', 'responses.id');
        if ($request->has('question_id')) {
            $query->where('question_id', '=', $request->question_id);
        } else {
            return response()->json("ID da pergunta é requerido", 400);
        }
        if ($request->has('user_id')) {
            $query->where('user_id', '=', $request->user_id);
            
        } 

        $query->join('alternatives', 'alternative_id', 'alternatives.id');
        $query->join('users', 'user_id', 'users.id');

        $responses = $query->get();

        return $responses;
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
    public function store(ResponseRequest $request)
    {
        try {
            $response = new ResponseModel;
            $response->fill($request->validated());
            $response->save();
            return new ResponseResource($response);
        } catch (\Exception $exception) {
            if (var_dump(property_exists($exception, "getMessage"))) {
                throw new HttpException(400, "Dados inválidos- {$exception->getMessage}");
            } else {
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
        $response = ResponseModel::findOrfail($id);

        return new ResponseResource($response);
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
    public function update(ResponseRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "ID inválido");
        }
        $question = ResponseModel::findOrFail($id);
        try {
            $question->fill($request->validated())->save();

            return new ResponseResource($question);
        } catch (\Exception $exception) {
            if (var_dump(property_exists($question, "getMessage"))) {
                throw new HttpException(400, "Dados inválidos- {$exception->getMessage}");
            } else {
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
        $response = ResponseModel::findOrfail($id);
        $response->delete();

        return response()->json(null, 204);
    }
}
