<?php

namespace App\Models;

use App\StateMachines;
use App\StateMachines\Contracts\PlanStateContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum State: string
{
    case Draft = 'Draft';
    case Submitted = 'Submitted';
    case Rejected = 'Rejected';
    case Cancelled = 'Cancelled';
    case Finalized = 'Finalized';
}

class Plan extends Model
{
    protected array $attributes = [
        'status' => State::Draft,
    ];

    public function state(): PlanStateContract
    {
        return match (State::from($this->status)) {
            State::Draft     => new DraftPlanState($this),
            State::Submitted => new SubmittedPlanState($this),
            State::Rejected  => new RejectedPlanState($this),
            State::Cancelled => new CancelledPlanState($this),
            State::Finalized => new FinalizedPlanState($this),
            default => throw new InvalidArgumentException ('Invalid Status')
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
        'status' => State::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'submitted_at' => 'datetime',
        'rejected_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

}
