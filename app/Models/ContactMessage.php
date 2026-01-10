<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
        'is_read',
        'read_at',
        'replied_at',
        'ip_address',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    /**
     * Scope para obtener mensajes no leídos
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope para obtener mensajes leídos
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Scope para obtener mensajes sin respuesta
     */
    public function scopeUnanswered($query)
    {
        return $query->whereNull('replied_at');
    }

    /**
     * Marcar mensaje como leído
     */
    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Marcar mensaje como respondido
     */
    public function markAsReplied(): void
    {
        $this->update([
            'replied_at' => now(),
        ]);
    }
}
