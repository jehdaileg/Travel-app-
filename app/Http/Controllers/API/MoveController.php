<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MoveResource;
use App\Http\Resources\MoveSingleResource;
use App\Http\Requests\MoveStoreRequest;
use App\Models\Move;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $moves = Move::all();

        if($request->search)
        {
            $moves = Move::where('name', 'like', "%{$request->search}%")
                           ->orWhere('code_move', 'like', "%{$request->search}%")
                           ->orWhere('description', 'like', "%{$request->search}%")
                           ->get();
        }
        else if($request->countrySelected)
        {
            $moves = Move::where('country_id', 'like', "%{$request->countrySelected}%")
                          ->orWhere('continent_id', 'like', "%{$request->countrySelected}%")
                          ->orWhere('province_id', 'like', "%{$request->countrySelected}%")
                          ->get();
        }

        return MoveResource::collection($moves);
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
    public function store(MoveStoreRequest $request)
    {
        //
        $move_validated = $request->validated();

        $move_created = Move::create($move_validated);

        return response()->json($move_created);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Move $move)
    {
        //
        return new MoveSingleResource($move);
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
    public function update(MoveStoreRequest $request, Move $move)
    {
        //

        $move = $move->update($request->validated());

        return response()->json(['ele'=> $move, 'message' => 'Updated Successfullys']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move $move)
    {
        //

        $move = $move->delete();

        return response()->json(['element'=> $move, 'message' => 'Cleaned Successfully']);
    }
}
