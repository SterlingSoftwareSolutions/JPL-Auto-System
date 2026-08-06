<?php

namespace App\Imports;

use App\Models\Part;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Expected headers (case‑insensitive): category_id, component_id, description, url, price, supplier
        $categoryId   = $row['category_id'] ?? $row['Category'] ?? null;
        $componentId  = $row['component_id'] ?? $row['Item'] ?? null;
        $description  = $row['description'] ?? $row['Description'] ?? null;
        $partNumber   = $row['url'] ?? $row['Part Number'] ?? null;
        $price        = $row['price'] ?? $row['Price'] ?? null;
        $supplierName = $row['supplier'] ?? $row['Supplier'] ?? null;

        return new Part([
            'category_id'   => $categoryId,
            'component_id'  => $componentId,
            'description'   => $description,
            'part_number'   => $partNumber,
            'price'         => $price,
            'supplier'      => $supplierName,
        ]);
    }
}
?>
