<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinalizePlanController extends Controller
{
    public function __invoke(Request $request, Plan $plan): Void
    {
        $plan->state()->finalize();
        # return view('plan.show', ['plan' => $plan]);
    }
}
