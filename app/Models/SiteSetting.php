<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($setting) {
            Cache::forget("site_setting.{$setting->key}");
        });

        static::deleted(function ($setting) {
            Cache::forget("site_setting.{$setting->key}");
        });
    }

    /**
     * Get a setting value by key
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = Cache::remember("site_setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting?->value ?? $default;
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget("site_setting.{$key}");
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache(): void
    {
        $settings = static::all();
        foreach ($settings as $setting) {
            Cache::forget("site_setting.{$setting->key}");
        }
    }
}
