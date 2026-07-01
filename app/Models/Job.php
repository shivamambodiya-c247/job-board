<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public static array $experience = [
        'entry' => 'Entry',
        'intermediate' => 'Intermediate',
        'senior' => 'Senior'
    ];
    public static array $categories = [
        'it' => 'IT',
        'finance' => 'Finance',
        'healthcare' => 'Healthcare',
        'education' => 'Education'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool
    {
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query
            ->when($filters['search'] ?? null, function ($query) use ($filters) {
                $search = $filters['search'];

                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%")
                        ->orWhereHas('employer', function ($query) use ($search) {
                            $query->where('company_name', 'like', "%{$search}%");
                        });
                });
            })
            ->when($filters['min_salary'] ?? null, function ($query) use ($filters) {
                $query->where('salary', '>=', $filters['min_salary']);
            })
            ->when($filters['max_salary'] ?? null, function ($query) use ($filters) {
                $query->where('salary', '<=', $filters['max_salary']);
            })
            ->when($filters['experience'] ?? null, function ($query) use ($filters) {
                $query->where('experience', $filters['experience']);
            })
            ->when($filters['category'] ?? null, function ($query) use ($filters) {
                $query->where('category', $filters['category']);
            });
    }
}
