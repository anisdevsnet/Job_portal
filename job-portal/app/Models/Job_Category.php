<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Category extends Model
{
    use HasFactory;
    protected $table='job_categories';
    protected $primaryKey = 'category_id';
    protected $fillable=[
        'name',
    ];
}
