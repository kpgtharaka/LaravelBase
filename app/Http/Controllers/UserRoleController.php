<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $userRoles = UserRole::query();
        if (!empty($q)) {
            $userRoles = $userRoles->where('name', 'LIKE', '%' . $q . '%');
        }
        $userRoles = $userRoles->where('id', 'NOT LIKE', '1');
        $userRoles = $userRoles->orderBy('id', 'asc')
            ->paginate();
        return view('user_role.index', compact('userRoles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_role.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:user_roles|string|max:255',
            'description' => 'nullable|string',
        ]);


        UserRole::create($data);
        return to_route('user_role.index')->with('message', 'User Role created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        $userRole->load('users');
        return view('user_role.show', compact('userRole'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRole $userRole)
    {
        if ($userRole->id == 1)
            return redirect()->route('user_role.index')->with('error', 'User Role Edit Prohibited.');;
        return view('user_role.edit', compact('userRole'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRole $UserRole)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:user_roles,name,' . $UserRole->id,
            'description' => 'nullable|string',
        ]);


        $UserRole->update($data);
        return to_route('user_role.index')->with('message', 'User Role updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $UserRole)
    {
        $UserRole->delete();
        return to_route('user_role.index')->with('message', 'User Role deleted successfully.');
    }
}
