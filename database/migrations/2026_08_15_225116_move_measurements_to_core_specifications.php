<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\VehicleSpecification;
use App\Models\VehicleInformation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Delete the numerical measurement data from the Specification accordion tabs
        $descriptionsToDelete = [
            'Length', 'Width', 'Track, Front', 'Track, Rear', 'Wheel Base', 'Overhang, Front + Rear (combined)',
            'Head Room, Front', 'Head Room, Rear', 'Hip Room, Front', 'Hip Room, Rear',
            'Curb / Tare Weight', 'Unladen Mass', 'Gross Weight (GVM)'
        ];
        VehicleSpecification::whereIn('description', $descriptionsToDelete)->delete();

        // 2. Move the Chassis properties into the Dimensions category (Category ID 3)
        $chassisDescriptions = [
            'Independent front and rear suspension for modern ride, handling and control',
            'Purpose-engineered chassis dimensions and geometry (full specification available on request)'
        ];
        VehicleSpecification::whereIn('description', $chassisDescriptions)->update(['category_id' => 3]);

        // 3. Add the measurement data into the "CORE SPECIFICATIONS" table (vehicle_information)
        $measurementsToAdd = [
            ['item_number' => 7, 'label' => 'Length', 'variant1' => '4,613 mm (181.6")'],
            ['item_number' => 8, 'label' => 'Width', 'variant1' => '~1,801 mm (70.9")'],
            ['item_number' => 9, 'label' => 'Track, Front', 'variant1' => '1,476 mm (58.1" — V8 spec)'],
            ['item_number' => 10, 'label' => 'Track, Rear', 'variant1' => '1,476 mm (58.1" — V8 spec)'],
            ['item_number' => 11, 'label' => 'Wheel Base', 'variant1' => '2,743 mm (108.0")'],
            ['item_number' => 12, 'label' => 'Overhang, Front + Rear (combined)', 'variant1' => '~1,869 mm total (Length - Wheelbase)'],
            ['item_number' => 13, 'label' => 'Head Room, Front', 'variant1' => '950 mm (37.4")'],
            ['item_number' => 14, 'label' => 'Head Room, Rear', 'variant1' => '~875 mm (34.4") - est.'],
            ['item_number' => 15, 'label' => 'Hip Room, Front', 'variant1' => '1,389 mm (54.7")'],
            ['item_number' => 16, 'label' => 'Hip Room, Rear', 'variant1' => '~865 mm (34") - est.'],
            ['item_number' => 17, 'label' => 'Curb / Tare Weight', 'variant1' => '~1,450–1,500 kg — estimate*'],
            ['item_number' => 18, 'label' => 'Unladen Mass', 'variant1' => '~1,450–1,500 kg — estimate*'],
            ['item_number' => 19, 'label' => 'Gross Weight (GVM)', 'variant1' => 'TBC — pending engineering calculation']
        ];

        // Ensure we attach them to the correct vehicle. By default, vehicle_id is 1.
        $vehicle = \App\Models\VehicleModel::first();
        $vehicleId = $vehicle ? $vehicle->id : 1;

        foreach ($measurementsToAdd as $measurement) {
            // Only insert if it doesn't exist yet to prevent duplicates on multiple runs
            if (!VehicleInformation::where('vehicle_id', $vehicleId)->where('label', $measurement['label'])->exists()) {
                VehicleInformation::create([
                    'vehicle_id' => $vehicleId,
                    'item_number' => $measurement['item_number'],
                    'label' => $measurement['label'],
                    'variant1' => $measurement['variant1'],
                    'variant2' => '-'
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('core_specifications', function (Blueprint $table) {
            //
        });
    }
};
