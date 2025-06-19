<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $table = 'Restaurant'; 
    protected $primaryKey = 'restaurant_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country',
        'city',
        
    ];

    
}
