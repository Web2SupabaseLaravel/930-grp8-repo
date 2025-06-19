<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
   use HasFactory;
    protected $table = "Reservation" ;
      protected $primaryKey = 'reservationid';
       public $incrementing = true;
    protected $keyType = 'int';
      public $timestamps = false;
      
    protected $fillable=[
         'name',
        'table_number' ,
        'status' ,
        'reservation_time'  ,
        'resto_rating', 
        'number_of_people',


    ];

    }
