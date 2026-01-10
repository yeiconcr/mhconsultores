<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'client_name',
        'company',
        'industry',
        'challenge',
        'solution',
        'results',
        'image',
        'images',
        'location',
        'completion_date',
        'duration_months',
        'is_featured',
        'show_client',
        'metrics',
    ];

    protected $casts = [
        'completion_date' => 'date',
        'is_featured' => 'boolean',
        'show_client' => 'boolean',
        'images' => 'array',
        'metrics' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
    }

    public function scopeByIndustry($query, $industry)
    {
        return $query->where('industry', $industry);
    }

    public function getYearAttribute()
    {
        return $this->completion_date ? $this->completion_date->year : null;
    }
}