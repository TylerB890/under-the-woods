<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class AcceptPlanController extends Controller
{
    public function __invoke(Plan $plan): void
    {
        $plan->state()->accept();
        // return view('plan.show', ['plan' => $plan]);
    }
}
