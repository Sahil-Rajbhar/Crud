<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeis extends Model
{
    use HasFactory;
    protected $table='Empdata';  

    
    protected $fillable=['Emp_Name' , 'Emp_Email', 'owner'];  
}