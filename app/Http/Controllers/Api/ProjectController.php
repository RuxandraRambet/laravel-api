<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        request()->validate([
            'key' => ['nullable', 'string', 'min:3']
        ]);


        if (request()->key) {
            $projects = Project::where('title', 'LIKE', '%' . request()->key . '%')->orWhere('description', 'LIKE', '%' . request()->key . '%')->paginate(9);
        } else {
            $projects = Project::with('type', 'technologies')->paginate(9);
        }


        // $projects = Project::all();
        // $projects = Project::with('type', 'technologies')->paginate(9);
        
        if ($projects) {
            return response()->json([
                'status' => true,
                'result' => $projects
            ]);
        } else {
            return response()->json([
                'status' => false,
                'result' => []
            ], 200);
        }
      
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        return response()->json([
            'status' => 'success',
            'result' => $project
        ]);
    }
}
