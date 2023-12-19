<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindVolunteer extends Model
{
    use HasFactory;
    protected $table = 'find_volunteer';
    protected $fillable = [
        'name',
        'born',
        'email',
        'phone',
        'start_date',
        'end_date',
        'period',
        'field',
        'progress',
    ];
}
