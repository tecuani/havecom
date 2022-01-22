<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        Gate::authorize('view-dashboard', $user);

        return view('admin.dashboard');
    }
}
