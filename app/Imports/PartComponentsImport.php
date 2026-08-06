<?php

namespace App\Imports;

use App\Models\PartComponent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartComponentsImport implements ToModel, WithHeadingRow
{
    /**
     * Map each row to a PartComponent model.
     * Expected column: Item (component name)
     */
    public function model(array $row)
    {
        // Assuming the Excel header uses 'Item' for component name.
        $componentName = $row['item'] ?? $row['component'] ?? null;
        if (!$componentName) {
            return null; // skip rows without a component name.
        }
        return new PartComponent([
            'component_name' => $componentName,
        ]);
    }
}
