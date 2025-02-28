<?php

namespace App\Services;

use App\Services\Service;
use App\Models\Product;

class ProductService extends Service{
    public function checkForStock($products1, mixed $sum, array $products, array $notFoundProducts): array
    {
        foreach($products1 as $requestProduct){
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if(
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ){
                // BU YERDAGI CODE NI DAVOM ETTIRISHING KERAK
            }else{
                // BU YERDAGI CODE NI DAVOM ETTIRISHING KERAK
            }
        }

        return array($sum, $products, $notFoundProducts);
    }
}