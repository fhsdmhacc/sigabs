<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'type_id',
        'total',
        'percentage',
    ];

    /**
     * Get the type that owns the result.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
