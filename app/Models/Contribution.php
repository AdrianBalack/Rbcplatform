<?php

namespace App\Models;

use App\Enums\ContributionStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
    /** @use HasFactory<\Database\Factories\ContributionFactory> */
    use HasFactory;
    use HasUuids, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'status',
    ];

    protected $casts = ['status' => ContributionStatus::class,];
    /**
     * Get the user associated with the Contribution
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the project associated with the Contribution
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }

    /**
     * Get the reward associated with the Contribution
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reward(): HasOne
    {
        return $this->hasOne(Reward::class);
    }
}
