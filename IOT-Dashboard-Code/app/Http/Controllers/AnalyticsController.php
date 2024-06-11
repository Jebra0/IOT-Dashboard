<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function getDays($today = null)
    {
        if ($today === null) {
            $today = Carbon::now()->format('Y-m-d');
        }

        $parsToday = Carbon::createFromFormat('Y-m-d', $today);

        $dates = [];

        for ($i = 0; $i <= 30; $i++) {
            $dates[] = $parsToday->copy()->subDays($i)->format('Y-m-d');
        }

        return response(json_encode([
            'dates' => $dates
        ]));
    }
}
