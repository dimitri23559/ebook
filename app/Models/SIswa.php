<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SIswa extends Model
{
    use HasFactory;
    protected $fillable =['name','genders','age'];
}
