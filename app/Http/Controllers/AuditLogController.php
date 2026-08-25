<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        // 1. Start an Eloquent query with relations loaded for performance
        $query = Activity::with(['causer', 'subject'])->latest();

        // 2. Filter by Module (Spatie's 'log_name')
        if ($request->filled('module')) {
            $query->where('log_name', $request->input('module'));
        }

        // 3. Filter by Action Performed (Spatie's 'description' - e.g., 'created', 'updated')
        if ($request->filled('action')) {
            $query->where('description', $request->input('action'));
        }

        // 4. Filter by the User who performed the action (Causer)
        if ($request->filled('user_id')) {
            $query->where('causer_id', $request->input('user_id'))
                  ->where('causer_type', 'App\Models\User'); // Adjust if your user model differs
        }

        // 5. Advanced: Filter inside the JSON 'properties' column (e.g., search for specific data values)
        if ($request->filled('search_data')) {
            $searchTerm = $request->input('search_data');
            $query->where('attribute_changes', 'like', '%' . $searchTerm . '%');
        }

        // 6. Paginate the results for your view
        $logs = $query->paginate(20)->withQueryString();

        $users = User::all();

        return view('activity_log.index', compact('logs', 'users'));
    }
}
