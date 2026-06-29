@extends('layout.backend')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Flight Details</h2>
        <a href="{{ route('flights.index') }}" class="btn btn-secondary">Back to Flights</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Flight Number</label>
                <div class="col-sm-9">{{ $flight->FlightNumber }}</div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Airline</label>
                <div class="col-sm-9">{{ $flight->Airline }}</div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Origin</label>
                <div class="col-sm-9">{{ $flight->Origin }}</div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Destination</label>
                <div class="col-sm-9">{{ $flight->Destination }}</div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Status</label>
                <div class="col-sm-9">{{ $flight->Status }}</div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('flights.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
