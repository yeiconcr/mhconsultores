<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_name',
        'email',
        'phone',
        'whatsapp_number',
        'company',
        'preferred_date',
        'preferred_time',
        'location_type',
        'city',
        'message',
        'status',
        'admin_notes',
        'confirmed_at',
        'cancelled_at',
        'cancellation_reason',
        'reminder_sent',
        'google_calendar_event_id',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'reminder_sent' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('preferred_date', '>=', now()->toDateString())
                    ->whereIn('status', ['pending', 'confirmed'])
                    ->orderBy('preferred_date', 'asc');
    }

    public function scopeNeedReminder($query)
    {
        return $query->confirmed()
                    ->where('reminder_sent', false)
                    ->where('preferred_date', '=', now()->addDay()->toDateString());
    }

    public function confirm()
    {
        $this->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);
    }

    public function cancel($reason = null)
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => $reason,
        ]);
    }

    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
    }

    public function getFormattedDateAttribute()
    {
        return $this->preferred_date->format('d/m/Y');
    }

    public function getFormattedTimeAttribute()
    {
        return date('g:i A', strtotime($this->preferred_time));
    }
}