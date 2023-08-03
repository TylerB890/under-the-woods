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
    use HasFactory;

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
}
