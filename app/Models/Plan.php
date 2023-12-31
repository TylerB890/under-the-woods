<?php

namespace App\Models;

use App\Enums\PlanState;
use App\StateMachines\Contracts\PlanStateContract;
use App\StateMachines\Plan\CancelledPlanState;
use App\StateMachines\Plan\DraftPlanState;
use App\StateMachines\Plan\FinalizedPlanState;
use App\StateMachines\Plan\RejectedPlanState;
use App\StateMachines\Plan\SubmittedPlanState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => PlanState::Draft,
    ];

    public function state(): PlanStateContract
    {
        return match ($this->status) {
            PlanState::Draft => new DraftPlanState($this),
            PlanState::Submitted => new SubmittedPlanState($this),
            PlanState::Rejected => new RejectedPlanState($this),
            PlanState::Cancelled => new CancelledPlanState($this),
            PlanState::Finalized => new FinalizedPlanState($this),
            default => throw new InvalidArgumentException('Invalid Status')
        };
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'origin',
        'destination',
        'start_date',
        'end_date',
        'submitted_at',
        'rejected_at',
        'cancelled_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => PlanState::class,
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'submitted_at' => 'datetime',
        'rejected_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    /**
     * Get the User that owns the Plan
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the days for the Plan
     */
    public function days(): HasMany
    {
        return $this->hasMany(Day::class);
    }
}
