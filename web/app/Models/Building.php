<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'longitude',
        'lattitude',
        'address'
    ];

    protected $table = 'buildings';

}
