@extends('layout.backend')

@section('content')

<h2>Add Inventory Item</h2>

<form action="{{ route('inventory.store') }}"
      method="POST">

@csrf

<div class="mb-3">
    <label>Item Name</label>
    <input type="text"
           name="ItemName"
           class="form-control">
</div>

<div class="mb-3">
    <label>Category</label>
    <input type="text"
           name="Category"
           class="form-control">
</div>

<div class="mb-3">
    <label>Stock Level</label>
    <input type="number"
           name="StockLevel"
           class="form-control">
</div>

<div class="mb-3">
    <label>Unit Price</label>
    <input type="number"
           step="0.01"
           name="UnitPrice"
           class="form-control">
</div>

<button class="btn btn-success">
    Save
</button>
<a class="btn btn-secondary" href="{!! url('/inventory')!!}">Back</a>
</form>

@endsection