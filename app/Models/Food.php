<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use CrudTrait;
    use HasFactory;

    //partie des contraintes de clé
    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }
}
