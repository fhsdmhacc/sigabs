<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $selected = $request->input('selected', []);
        
        return Role::query()
                    ->when($search = $request->input('search'), function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->when(!$search and $selected, function ($query) use ($selected) {
                        $query->whereIn('name', $selected)->orWhere(function ($query) use ($selected) {
                            $query->whereNotIn('name', $selected);
                        });
                    })
                    ->get()
                    ->map(fn (Role $role) => $role->only('name'));
    }
}
