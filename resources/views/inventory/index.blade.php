@extends('layout.backend')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Inventory Management</h2>

    <a href="{{ route('inventory.create') }}"
       class="btn btn-primary">
       Add Item
    </a>

</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form method="GET">
    <input type="text"
           name="search"
           class="form-control mb-3"
           placeholder="Search Item">
</form>

<table class="table table-bordered">

    <thead>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Price</th>
        <th width="180">Action</th>
    </tr>
    </thead>

    <tbody>

    @foreach($inventory as $item)

    <tr>

        <td>{{ $item->IngredientID }}</td>

        <td>{{ $item->ItemName }}</td>

        <td>{{ $item->Category }}</td>

        <td>
            @if($item->StockLevel < 10)

                <span class="badge bg-danger">
                    {{ $item->StockLevel }}
                </span>

            @else

                <span class="badge bg-success">
                    {{ $item->StockLevel }}
                </span>

            @endif
        </td>

        <td>${{ $item->UnitPrice }}</td>

        <td>

            <a href="{{ route('inventory.edit',$item->IngredientID) }}"
               class="btn btn-warning btn-sm">
               Edit
            </a>

            <form
                action="{{ route('inventory.destroy',$item->IngredientID) }}"
                method="POST"
                style="display:inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

{{ $inventory->links() }}

@endsection