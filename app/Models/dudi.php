<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dudi extends Model
{
    use HasFactory;
    protected $table ='dudi';
    protected $fillable =[
        'nama',
        'alamat',
    ];

}
