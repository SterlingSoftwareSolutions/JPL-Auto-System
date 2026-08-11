<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VehicleImage;

class VehicleImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'figure_number' => 'required|integer|min:1|max:9',
            'title' => 'required|string',
            'vehicle_id' => 'nullable|integer'
        ]);

        $vehicleId = $request->input('vehicle_id', 1);
        $figureNumber = $request->input('figure_number');
        $title = $request->input('title');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vehicle_images', 'public');

            $vehicleImage = VehicleImage::updateOrCreate(
                ['vehicle_id' => $vehicleId, 'figure_number' => $figureNumber],
                ['title' => $title, 'image_path' => $path]
            );

            return response()->json([
                'success' => true,
                'image_url' => asset('storage/' . $path),
                'figure_number' => $figureNumber
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No image uploaded.'], 400);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'figure_number' => 'required|integer|min:1|max:9',
            'vehicle_id' => 'nullable|integer'
        ]);

        $vehicleId = $request->input('vehicle_id', 1);
        $figureNumber = $request->input('figure_number');

        $vehicleImage = VehicleImage::where('vehicle_id', $vehicleId)
            ->where('figure_number', $figureNumber)
            ->first();

        if ($vehicleImage) {
            // Optionally remove from storage: Storage::disk('public')->delete($vehicleImage->image_path);
            $vehicleImage->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
    }
}
