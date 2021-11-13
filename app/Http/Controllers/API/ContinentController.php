<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContinentStoreRequest;
use App\Http\Resources\ContinentResource;
use App\Http\Resources\ContinentSingleResource;
use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $continents = Continent::all();

        if($request->search)
        {
            $continents = Continent::where('name', 'like', "%{$request->search}%")->get();
        }


        return ContinentResource::collection($continents);
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
    public function store(ContinentStoreRequest $request)
    {
        //
       $continent_validated = $request->validated();

       $continent_created = Continent::create($continent_validated);

       return response()->json($continent_created);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        //
        return new ContinentSingleResource($continent);
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
    public function update(ContinentStoreRequest $request, Continent $continent)
    {
        //
        $continent->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent)
    {
        //
        $continent = $continent->delete();

       // return response()->json(['element'=> $continent, 'message'=> 'Continent Deleted Successfully']);

       return response()->json('Continent Deleted Successfully');

    }
}
