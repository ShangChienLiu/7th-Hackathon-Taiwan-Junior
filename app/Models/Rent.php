<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = 'rent_register';
    protected $fillable = [
        'name',
        'born',
        'rent_period',
        'email',
        'data',
        'phone',
        'parent_name',
        'parent_phone',
        'parent_relation',
        'progress'
    ];
    public $timestamps = TRUE;
}
