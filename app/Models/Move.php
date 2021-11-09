<?php

namespace App\Models;

use App\Models\Continent;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Move extends Model
{
    use HasFactory;

    protected $guarded = [];


   public function continent()
   {
       return $this->belongsTo(Continent::class);
   }

   public function country()
   {
       return $this->belongsTo(Country::class);
   }

   public function province()
   {
       return $this->belongsTo(Province::class);
   }
}
