<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$opsData = json_decode(file_get_contents('ops.json'), true);

foreach ($opsData as $opData) {
    if (!empty($opData['qc'])) {
        $opCode = $opData['opNo'];
        $operation = \App\Models\VehicleBuildOperation::where('code', $opCode)->first();
        if ($operation) {
            $qcChecks = $operation->qcChecks()->orderBy('order')->get();
            foreach ($opData['qc'] as $idx => $qc) {
                if (isset($qc[2]) && $qc[2] !== null && isset($qcChecks[$idx])) {
                    $dbQc = $qcChecks[$idx];
                    if ($dbQc->after_step !== $qc[2]) {
                        $dbQc->after_step = $qc[2];
                        $dbQc->save();
                        echo "Fixed after_step for $opCode QC index $idx to {$qc[2]}\n";
                    }
                }
            }
        }
    }
}
echo "Done fixing QC after_step across all ops.\n";
