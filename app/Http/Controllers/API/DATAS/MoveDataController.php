<?php

namespace App\Http\Controllers\API\DATAS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Continent;
use App\Models\Country;

class MoveDataController extends Controller
{
    //

    public function continents()
    {
        $continents = Continent::all();

        return response()->json($continents);
    }

    public function countries(Continent $continent)
    {
        return response()->json($continent->countries);
    }

    public function provinces(Country $country)
    {
        return response()->json($country->provinces);
    }
}