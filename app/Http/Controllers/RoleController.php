<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log as Logger;

class RoleController extends Controller
{

    // Controller methods for role management can be added here
    public function change(Request $request)
    {
        Logger::info(message: 'Changing role for user ID: ' . $request->user()->id . ' to role ID: ' . ($request->role + 2));

        $request->validate([
            'role' => ['required', 'integer', 'in:0,1'],
        ]);

        if (!in_array($request->role + 2, [2, 3])) {
            return Redirect::route('profile.edit')->with(['status' => 'role-update-failed']);
        }

        else if ($request->user()->role_id == $request->role + 2) {
            return Redirect::route('profile.edit')->with('status', 'role-unchanged');
        }

        $user = $request->user();
        $user->role_id = $request->role + 2; // Adjusting role to match seeded IDs
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'role-updated');
    }
}
