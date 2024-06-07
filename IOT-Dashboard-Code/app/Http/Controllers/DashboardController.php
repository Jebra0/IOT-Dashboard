<?php

namespace App\Http\Controllers;

use App\Models\PhSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $ph_dataset = DB::table('ph_sensors')
            ->orderBy('id', 'DESC')
            ->limit(6);
        $temp_dataset = DB::table('temp_sensors')
            ->orderBy('id', 'DESC')
            ->limit(6);

        $PhLabelsData = $ph_dataset->pluck('created_at');
        $phData = $ph_dataset->pluck('data');
        $TempLabelsData = $temp_dataset->pluck('created_at');
        $tempData = $temp_dataset->pluck('data');
        $users = DB::table('users')->select('name', 'email')->get();;

        return json_encode([
            'phlabelsdata' => $PhLabelsData,
            'phdata' => $phData,
            'templabelsdata' => $TempLabelsData,
            'tempdata' => $tempData,
            'users' => $users
        ]);
    }
}
