<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $users = User::query();
        if (!empty($q)) {
            $users = $users->where('name', 'LIKE', '%' . $q . '%');
        }
        if (!auth()->user()->isAdmin())
            $users = $users->where('id', 'NOT LIKE', '1');
        $users = $users->orderBy('id', 'asc')
            ->paginate();
        //$users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        User::create($request->all());
        return redirect()->route('users.index')->with('message', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!auth()->user()->isAdmin())
            if ($user->id == 1)
                return redirect()->route('users.index')->with('error', 'User Edit Prohibited.');;
        $userRole = UserRole::all();
        return view('users.edit', compact('user'))->with('userRoles', $userRole);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validationRules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];


        if ($request->filled('password')) {
            $validationRules['password'] = 'min:8';
        }
        $request->validate($validationRules);
        $data = $request->all();
        // Hash the password only if it's present
        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // Remove password from request if not provided
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('message', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User deleted successfully.');
    }
}
