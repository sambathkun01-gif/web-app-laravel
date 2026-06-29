@extends('layout.backend')

@section('content')

<div class="container">

<h2>Edit Flight</h2>

<form action="{{ route('flights.update',$flight->id) }}"
      method="POST">

@csrf
@method('PUT')

<div class="mb-3">
    <label>Flight Number</label>
    <input type="text"
           name="FlightNumber"
           value="{{ $flight->FlightNumber }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Airline</label>
    <input type="text"
           name="Airline"
           value="{{ $flight->Airline }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Origin</label>
    <input type="text"
           name="Origin"
           value="{{ $flight->Origin }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Destination</label>
    <input type="text"
           name="Destination"
           value="{{ $flight->Destination }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Status</label>
    <input type="text"
           name="Status"
           value="{{ $flight->Status }}"
           class="form-control">
</div>

<button class="btn btn-primary">
    Update Flight
</button>
<a class="btn btn-secondary" href="{!! url('/flights')!!}">Back</a>

</form>

</div>

@endsection