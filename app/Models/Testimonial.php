<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_name',
        'company',
        'position',
        'content',
        'rating',
        'image',
        'is_featured',
        'approved',
        'date',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'approved' => 'boolean',
        'date' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}