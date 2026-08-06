<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuppliersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Map the Excel column "Supplier" (case‑insensitive) to business_name.
        $businessName = $row['supplier'] ?? $row['name'] ?? null;
        if (!$businessName) {
            // Skip rows without a supplier name – prevents NULL constraint violation.
            return null;
        }

        return new Supplier([
            'business_name' => $businessName,
        ]);
    }
}
