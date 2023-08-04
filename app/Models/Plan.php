<?php

namespace App\Models;

use App\Enums\PlanState;
use App\StateMachines\Contracts\PlanStateContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => PlanState::Draft,
    ];

    public function state(): PlanStateContract
    {
        return match (State::from($this->status)) {
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
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'submitted_at' => 'datetime',
        'rejected_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];
}
