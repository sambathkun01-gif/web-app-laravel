@extends('layout.backend')

@section('content')

<h1>Inventory Details</h1>

<div class="card">

    <div class="card-header">
        Item Information
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">Ingredient ID</th>
                <td>{{ $inventory->IngredientID }}</td>
            </tr>

            <tr>
                <th>Item Name</th>
                <td>{{ $inventory->ItemName }}</td>
            </tr>

            <tr>
                <th>Category</th>
                <td>{{ $inventory->Category }}</td>
            </tr>

            <tr>
                <th>Stock Level</th>
                <td>

                    @if($inventory->StockLevel < 10)

                        <span class="badge bg-danger">
                            {{ $inventory->StockLevel }}
                        </span>

                    @else

                        <span class="badge bg-success">
                            {{ $inventory->StockLevel }}
                        </span>

                    @endif

                </td>
            </tr>

            <tr>
                <th>Unit Price</th>
                <td>${{ $inventory->UnitPrice }}</td>
            </tr>

        </table>

        <a href="{{ route('inventory.index') }}"
            class="btn btn-secondary">
            Back
        </a>

        <a href="{{ route('inventory.edit',$inventory->IngredientID) }}"
            class="btn btn-warning">
            Edit
        </a>

    </div>

</div>

@endsection