<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    /** @use HasFactory<\Database\Factories\RewardsFactory> */
    use HasFactory;
    use HasUuids, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'amount',
        'limited_quantity',
        'estimated_delivery',
        'project_id'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * Get the project associated with the Rewards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
