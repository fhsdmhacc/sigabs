<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    /**
     * Scope a query to only include users who have email.
     */
    public function scopeEmail(Builder $query, string $email): void
    {
        $query->where('email', $email);
    }

    /**
     * Scope a query to only include users who have non-expired token.
     */
    public function scopeNonExpired(Builder $query): void
    {
        $query->where('created_at', '>', now()->subMinutes(config('auth.passwords.users.expire')));
    }
}
