<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'address_line_1'    => 'required|string',
            'address_line_2'    => 'nullable|string',
            'city'              => 'required|string',
            'state'             => 'required|string',
            'contact'           => 'required|string',
            'zip'               => 'required|string'
        ]);

        $user = $request->user();

        $user->update($validated);

        session()->flash('alert', [
            'status'    => 'success',
            'message'   => 'Your address has been updated.'
        ]);

        return redirect()->back();
    }
}
