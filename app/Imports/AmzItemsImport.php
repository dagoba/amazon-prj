<?php

namespace App\Imports;

use App\AmzItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class AmzItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] !== 'Name' && count($row) == 24 ){
            return new AmzItem([
                'name' => $row[0],
                'brand' => $row[1],
                'price' => $row[2],
                'min_price' => $row[3],
                'net' => $row[4],
                'fba_fees' => $row[5],
                'lqs' => $row[6],
                'category' => $row[7],
                'sellers' => $row[8],
                'rank' => $row[9],
                'est_sales' => $row[10],
                'est_revenue' => $row[11],
                'reviews_count' => $row[12],
                'available_from' => $row[13],
                'rating' => $row[14],
                'seller' => $row[15],
                'weight' => $row[16],
                'shipping_weight' => $row[17],
                'size' => $row[18],
                'colors' => $row[19],
                'oversize' => $row[20],
                'sizes' => $row[21],
                'asin' => $row[22],
                'url' => $row[23]
            ]);
        }
    }
}
