<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_categories';
    protected $fillable=[
        'user_id',
        'company_id',
        'category',
        'title',
        'slug',
        'description',
        'job_position',
        'status',
        'type',
        'last_date',
        'address',
    ];
}
