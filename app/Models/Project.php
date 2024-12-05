<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;
    use HasUuids, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'goal_amount',
        'current_amount',
        'start_date',
        'end_date',
        'status',
        'category',
    ];

    protected $casts = ['status' => ProjectStatus::class,];
    /**
     * Get all of the user for the Projects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function user(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Reward::class);
    }

    /**
     * Get all of the rewards for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rewards(): HasMany
    {
        return $this->hasMany(Reward::class);
    }
}
