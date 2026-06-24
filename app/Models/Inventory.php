<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    protected $primaryKey = 'IngredientID';

    protected $fillable = [
        'ItemName',
        'Category',
        'StockLevel',
        'UnitPrice'
    ];
}