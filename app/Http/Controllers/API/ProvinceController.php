<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\ProvinceSingleResource;
use App\Http\Requests\ProvinceStoreRequest;
use App\Models\Province;


class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = Province::all();

        return ProvinceResource::collection($provinces);


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
    public function store(ProvinceStoreRequest $request)
    {
        //
        $province_validated = $request->validated();

        return response()->json(['element'=> Province::create($province_validated),'message' => 'Province generated Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
        return new ProvinceSingleResource($province);
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
    public function update(ProvinceStoreRequest $request, Province $province)
    {
        //
        $province->update($request->validated());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
        $province->delete();

        return response()->json('Province Ejected Well');

    }
}
