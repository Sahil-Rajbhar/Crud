<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table='employee_details';  
    protected $fillable=['employe_name' , 'employe_email', 'owner'];  
}