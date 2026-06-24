<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query();

        if ($request->search) {
            $query->where('ItemName', 'like', '%' . $request->search . '%');
        }

        $inventory = $query->paginate(10);

        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ItemName' => 'required',
            'Category' => 'required',
            'StockLevel' => 'required|integer',
            'UnitPrice' => 'required|numeric'
        ]);

        Inventory::create($request->all());

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Item Added Successfully');
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);

        return view('inventory.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Inventory::findOrFail($id);

        $item->update($request->all());

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Item Updated Successfully');
    }

    public function destroy($id)
    {
        Inventory::destroy($id);

        return redirect()
            ->route('inventory.index')
            ->with('success', 'Item Deleted Successfully');
    }
}