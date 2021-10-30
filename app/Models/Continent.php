<?php

namespace App\Models;

use App\Models\Move;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Continent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function moves()
    {
        return $this->hasMany(Move::class);
    }


}
