<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
   use HasFactory;
    protected $table = "Reservation" ;
    protected $fillable=[

         'name',
        'table_number' ,
        'status' ,
        'reservation_time'  ,
        'resto_rating', 
        'number_of_people' 


    ];

    }
