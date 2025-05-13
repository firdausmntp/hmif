<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 
        'detail', 
        'category', 
        'image',
        'event_date',    
        'start_time',    
        'end_time',      
        'location',      
        'status'         
    ];

    // Konversi otomatis string tanggal menjadi objek Carbon
    protected $dates = [
        'created_at',
        'updated_at',
        'event_date',
    ];
    
    // Kategori mapping
    public const CATEGORIES = [
        'A' => 'LOMBA',
        'B' => 'WEBINAR',
        'C' => 'MEETUP'
    ];
    
    // Mendapatkan nama kategori yang sesuai
    public function getCategoryNameAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }
}