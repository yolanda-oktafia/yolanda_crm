<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lead_id',
        'user_id',
        'value',
        'status',
        'notes',
    ];

    /**
     * Relasi ke Lead.
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Relasi ke User (Sales).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi Many-to-Many ke Products.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'price') 
                    ->withTimestamps();
    }
}
