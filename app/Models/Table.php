<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Administrator;

class Table extends Model
{
    use HasFactory;

    protected $table = 'Table'; // اسم الجدول في قاعدة البيانات
    protected $primaryKey = 'Table_naumber'; // المفتاح الأساسي
    public $incrementing = false; // لأنه مش auto-increment
    protected $keyType = 'int';   // نوع المفتاح الأساسي
    public $timestamps = false;

    protected $fillable = [
        'Table_naumber',
        'status',
        'Size',
        'restaurant_id',
        'admin_id',
    ];

    // علاقة اختيارية (تبقى موجودة لاستخدامها لاحقاً إن أردت عرض الأسماء)
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'restaurant_id');
    }

    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'admin_id', 'Admin_id');
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Table extends Model
// {
//     use HasFactory;

//     protected $table = 'Table'; // إذا كان فعلاً الاسم كابيتال T
//     protected $primaryKey = 'Table_naumber';
//     public $incrementing = false;
//     protected $keyType = 'int';

//     protected $fillable = [
//         'Table_naumber',
//         'status',
//         'Size',
//         'resturant_id',
//         'admin_id',
//     ];
// }
// }
