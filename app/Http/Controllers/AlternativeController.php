<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative as Alternative;
use App\Http\Resources\AlternativeResource;
use App\Http\Requests\AlternativeRequest;
use Exception;
use Illuminate\Http\Response;
use App\Models\Response as ResponseModel;

use Symfony\Component\HttpKernel\Exception\HttpException;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Alternative::query();
        if ($request->has('question_id')) {
            $query->where('question_id', '=',  $request->question_id);
        }else{
            return response()->json("ID da pergunta é requerido", 400);
        }
        // $query.with('responses')->whereRelation('responses', 'name', 'like', '%'.$name.'%');
        $alternatives = $query->get('*')->toArray();




        // $responses = ResponseModel::query();
        // $responses->whereRelation()

        return $alternatives;
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
    public function store(AlternativeRequest $request)
    {
        try {
            $alternative = new Alternative;
            $alternative->fill($request->validated());
            $alternative->save();
            return new AlternativeResource($alternative);
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
        $alternative = Alternative::findOrfail($id);

        return new AlternativeResource($alternative);
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
    public function update(AlternativeRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "ID inválido");
        }
        $question = Alternative::findOrFail($id);
        try {
            $question->fill($request->validated())->save();

            return new AlternativeResource($question);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Dados inválidos- {$exception->getMessage}");
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
        $alternative = Alternative::findOrfail($id);
        $alternative->delete();

        return response()->json(null, 204);
    }
}
