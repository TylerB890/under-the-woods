<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class SubmitPlanController extends Controller
{
    public function __invoke(Plan $plan): void
    {
        $plan->state()->submit();
    }
}
