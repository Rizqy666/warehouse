<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        LogHelper::logActivity('Create', 'User menambahkan user: ' . $user->name);

        return redirect()->route('users.index')->with('success', 'User berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->role = $request->input('role');
        $user->save();
        LogHelper::logActivity('Update', 'User mengubah user: ' . $user->name);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        LogHelper::logActivity('Delete', 'User menghapus user: ' . $user->name);

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
