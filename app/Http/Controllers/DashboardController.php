<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArchiveRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $requests = ArchiveRequest::orderBy('created_at', 'desc')->get();
        $totalRequests = ArchiveRequest::count();

        return view('pages.dashboard', compact('requests', 'totalRequests'));
    }
}
