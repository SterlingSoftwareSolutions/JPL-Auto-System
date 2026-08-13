<?php
$builds = \App\Models\VehicleModel::all();
$controller = app(\App\Http\Controllers\VehicleController::class);
$reflection = new ReflectionMethod($controller, 'seedBuildProcess');
$reflection->setAccessible(true);
foreach($builds as $b) {
    if ($b->buildStations()->count() == 0) {
        $reflection->invoke($controller, $b);
        echo "Seeded build {$b->id}\n";
    }
}
echo "Done seeding.\n";
