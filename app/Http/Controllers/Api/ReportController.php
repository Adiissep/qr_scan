<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;

class ReportController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(["scan:id,tittle", "participant:id,name,email,phone"])
        ->orderBy("created_at", "desc")
        ->get();

        return view("report", compact("attendances"));
    }
}
