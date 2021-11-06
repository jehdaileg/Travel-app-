<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\Continent;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function continent()
    {
        return $this->belongsTo(Continent::class);

    }

    public function provinces()
    {
        return $this->hasMany(Province::class);

    }

    public function moves()
    {
        return $this->hasMany(Move::class);
    }

}
