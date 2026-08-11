<?php

namespace App\Http\Controllers;

use App\Models\BuildTask;
use Illuminate\Http\Request;

class BuildSystemController extends Controller
{
    public function index()
    {
        $tasks = BuildTask::all();
        return view('pages.buildsystem.buildpage', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'track' => 'required|string|max:255',
            'phase' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'cost' => 'nullable|numeric|min:0',
            'start' => 'nullable|integer|min:1',
            'dur' => 'nullable|integer|min:1',
        ]);

        $task = BuildTask::create([
            'track' => $validated['track'],
            'phase' => $validated['phase'],
            'label' => $validated['label'],
            'cost' => $validated['cost'] ?? 0,
            'start' => $validated['start'] ?? 1,
            'dur' => $validated['dur'] ?? 1,
        ]);

        return response()->json(['success' => true, 'task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = BuildTask::findOrFail($id);

        $validated = $request->validate([
            'track' => 'sometimes|string|max:255',
            'phase' => 'sometimes|string|max:255',
            'label' => 'sometimes|string|max:255',
            'cost' => 'sometimes|numeric|min:0',
            'start' => 'sometimes|integer|min:1',
            'dur' => 'sometimes|integer|min:1',
        ]);

        $task->update($validated);

        return response()->json(['success' => true, 'task' => $task]);
    }

    public function destroy($id)
    {
        $task = BuildTask::findOrFail($id);
        $task->delete();

        return response()->json(['success' => true]);
    }
}
