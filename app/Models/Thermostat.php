<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thermostat extends Model
{
    use HasFactory;
    protected $fillable = ['cn','hourmeter','pic','installed'];
}
