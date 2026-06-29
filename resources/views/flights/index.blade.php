@extends('layout.backend')

@section('content')

<div class="container">

    <h2>Flights List</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('flights.create') }}" class="btn btn-primary">
            Add Flight
        </a>

        <form method="GET" action="{{ route('flights.index') }}" class="d-flex">
            <input type="text" 
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Search by ID, flight number, airline, origin, destination...">
            <button type="submit" class="btn btn-secondary ms-2">Search</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Flight Number</th>
                <th>Airline</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Status</th>
                <th width="200">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($flights as $flight)

            <tr>
                <td>{{ $flight->id }}</td>
                <td>{{ $flight->FlightNumber }}</td>
                <td>{{ $flight->Airline }}</td>
                <td>{{ $flight->Origin }}</td>
                <td>{{ $flight->Destination }}</td>
                <td>{{ $flight->Status }}</td>

                <td>
                   <a href="{{ route('flights.show',$flight->id) }}"
                        class="btn btn-info btn-sm">
                        View
                    </a>
                    <a href="{{ route('flights.edit',$flight->id) }}"
                       class="btn btn-warning">
                       Edit
                    </a>

                    <form action="{{ route('flights.destroy',$flight->id) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    @if(method_exists($flights, 'links'))
        <div class="mt-3">
            {{ $flights->appends(request()->query())->links() }}
        </div>
    @endif

</div>

@endsection