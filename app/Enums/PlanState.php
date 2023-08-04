<?php

namespace App\Enums;

enum PlanState: string
{
    case Draft = 'Draft';
    case Submitted = 'Submitted';
    case Rejected = 'Rejected';
    case Cancelled = 'Cancelled';
    case Finalized = 'Finalized';
}
