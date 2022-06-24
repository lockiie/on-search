<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative as Alternative;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Resources\AlternativeResource;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlternativeResource::collection(Alternative::paginate(30));
    }

    /**  
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $alternative = new Alternative;
            $alternative->fill($request->validated())->save();

            return new AlternativeResource($alternative);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
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
        $alternatives = Alternative::findOrFail($id);
        return new AlternativeResource($alternatives);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (!$id) {
        //     throw new HttpException(400, "Invalid id");
        // }

        // try {
        //    $book = Book::find($id);
        //    $book->fill($request->validated())->save();

        //    return new BookResource($book);

        // } catch(\Exception $exception) {
        //    throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
