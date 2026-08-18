<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$ops = json_decode(file_get_contents('ops.json'), true);
foreach($ops as $opData) { 
    if (isset($opData['qc']) && strpos($opData['opNo'], 'OP-4') === 0) { 
        foreach ($opData['qc'] as $qc) { 
            if (isset($qc[2]) && $qc[2] !== null) { 
                $dbQc = \App\Models\OperationQcCheck::whereHas('operation', function($q) use ($opData) { 
                    $q->where('code', $opData['opNo']); 
                })->where('specification', $qc[0])->first(); 
                
                if ($dbQc) { 
                    $dbQc->after_step = $qc[2]; 
                    $dbQc->save(); 
                    echo 'Fixed QC for ' . $opData['opNo'] . PHP_EOL; 
                } 
            } 
        } 
    } 
}
