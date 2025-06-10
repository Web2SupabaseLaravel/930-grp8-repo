<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'Restaurant';
    public $timestamps = false;
    protected $primaryKey = 'restaurant_id'; 
    public $incrementing = false; 

    protected $keyType = 'int';
    protected $fillable = [
        'restaurant_id',
        'name',
        'country',
        'city',
        'street',
        'building',
        'phone_number',
        'category',
        'open_time',
        'close_time',
        'seating_capacity'
    ];
}

