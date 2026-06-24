@extends('layout.backend')

@section('content')

<h2>Edit Inventory</h2>

<form
action="{{ route('inventory.update',$item->IngredientID) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">
    <label>Item Name</label>
    <input type="text"
           name="ItemName"
           value="{{ $item->ItemName }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Category</label>
    <input type="text"
           name="Category"
           value="{{ $item->Category }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Stock Level</label>
    <input type="number"
           name="StockLevel"
           value="{{ $item->StockLevel }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Unit Price</label>
    <input type="number"
           step="0.01"
           name="UnitPrice"
           value="{{ $item->UnitPrice }}"
           class="form-control">
</div>

<button class="btn btn-primary">
    Update
</button>
<a class="btn btn-secondary" href="{!! url('/inventory')!!}">Back</a>

</form>

@endsection