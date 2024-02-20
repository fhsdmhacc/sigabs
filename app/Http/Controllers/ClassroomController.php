<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $selected = $request->input('selected', []);
        
        return Classroom::query()
                        ->when($search = $request->input('search'), function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        })
                        ->when(!$search and $selected, function ($query) use ($selected) {
                            $query->whereIn('id', $selected)->orWhere(function ($query) use ($selected) {
                                $query->whereNotIn('id', $selected);
                            });
                        })
                        ->get()
                        ->map(fn (Classroom $classroom) => $classroom->only('id', 'name'));
    }
}
