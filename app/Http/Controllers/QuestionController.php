<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question as Question;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionRequest;
use App\Models\Response as ResponseModel;
use Exception;
use Illuminate\Http\Response;

use Symfony\Component\HttpKernel\Exception\HttpException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Question::query();


        // if ($request->has('email')) {
        //     $query->where('email', '=',  $request->email);
        // }
        $questions = $query->paginate(25);

        // $questions->foreach()
        // foreach ($questions as $question) {
        //     $responses = ResponseModel::query();
        //     $responses->where()
        // }



        return $questions;
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
    public function store(QuestionRequest $request)
    {
        try {
            $question = new Question;
            $question->fill($request->validated());
            $question->save();
            return new QuestionResource($question);
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
        $question = Question::findOrfail($id);

        return new QuestionResource($question);
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
    public function update(QuestionRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "ID inválido");
        }
        $question = Question::findOrFail($id);
        try {
            $question->fill($request->validated())->save();

            return new QuestionResource($question);
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
        $question = Question::findOrfail($id);
        $question->delete();

        return response()->json(null, 204);
    }
}
