<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

		if($user->is_admin) {
			return view('admin.dashboard');
		}

		return view('customer.dashboard');
    }
}
