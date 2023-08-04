<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecallPlanController extends Controller
{
    public function __invoke(Request $request, Plan $plan): void
    {
        $plan->state()->recall();
    }
}
