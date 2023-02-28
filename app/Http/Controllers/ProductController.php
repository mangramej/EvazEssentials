<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware(function (Request $request, Closure $next) {
			$user = $request->user();

			abort_if(! $user->is_admin, 403);

			return $next($request);
		});
	}

	public function __invoke(Request $request)
    {
    	return view('admin.products');
    }
}
