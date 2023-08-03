<?php

namespace App\Models;

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
}
