<?php

namespace App\Imports;

use App\Models\PartCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartCategoriesImport implements ToModel, WithHeadingRow
{
    /**
     * Map a row from the Excel sheet to a PartCategory model.
     * Expected column heading: "category".
     */
    public function model(array $row)
    {
        // Skip empty rows
        if (empty($row['category'])) {
            return null;
        }

        return new PartCategory([
            'category_name' => $row['category'],
        ]);
    }
}
