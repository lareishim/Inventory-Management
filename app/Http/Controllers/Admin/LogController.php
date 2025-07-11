<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index(): View
    {
        $logs = Activity::latest()->paginate(15);
        return view('admin.logs', compact('logs'));
    }

    public function clear(): RedirectResponse
    {
        Activity::truncate();
        return redirect()->route('admin.logs')->with('success', 'All activity logs have been cleared.');
    }
}