<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\CityResource;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = City::query();
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        $cities = $query->paginate(25);

        return $cities;

        // return CityResource::collection(City::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
        //     $City = new City;
        //     $City->fill($request->validated())->save();

        //     return new CityResource($City);

        // } catch(\Exception $exception) {
        //     throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $City = City::findOrfail($id);

        // return new CityResource($City);
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
        //    $City = City::find($id);
        //    $City->fill($request->validated())->save();

        //    return new CityResource($City);

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
        // $City = City::findOrfail($id);
        // $City->delete();

        // return response()->json(null, 204);
    }
}
