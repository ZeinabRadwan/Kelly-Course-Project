<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user
    public function store(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create the user
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Redirect to the users list with success message
            return redirect()->route('user.index')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // Log the error details
            Log::error('User creation failed', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            // Redirect with an error message
            return redirect()->route('user.index')->with('error', 'Failed to create user. Please try again.');
        }
    }

    // Show the form to edit the user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update the user
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed', 
            ]);
    
            $user = User::findOrFail($id);
    
            $user->name = $validated['name'];
            $user->email = $validated['email'];
    
            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }
    
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            Log::error('User update failed', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
    
            return redirect()->route('user.index')->with('error', 'Failed to update user. Please try again.');
        }
    }
    public function showCertificates(User $user)
    {
        // Ensure that the logged-in user can only see their own certificates
        if ($user->id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the certificates of the authenticated user
        $certificates = $user->certificates; 

        return view('users.certificates', compact('certificates'));
    }
}
