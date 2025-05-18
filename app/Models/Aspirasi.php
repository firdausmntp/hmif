<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aspirasi';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'aspirasi',
        'is_anonymous',
        'status',
        'response',
        'admin_id',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_anonymous' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    /**
     * Get the display name based on anonymity setting.
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        return $this->is_anonymous ? 'Anonim' : $this->name;
    }
    
    /**
     * Scope a query to only include pending aspirations.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
    
    /**
     * Get the admin that responded to this aspiration.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}