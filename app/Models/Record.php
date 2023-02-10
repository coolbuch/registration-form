<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['name', 'surname', 'lastname', 'sex', 'group', 'date', 'enableSMS', 'email'];
    use HasFactory;
}
