@extends('layout.backend')

@section('content')

<div class="container">

<h2>Add Flight</h2>

<form action="{{ route('flights.store') }}" method="POST">

@csrf

<div class="mb-3">
    <label>Flight Number</label>
    <input type="text"
           name="FlightNumber"
           class="form-control">
</div>

<div class="mb-3">
    <label>Airline</label>
    <input type="text"
           name="Airline"
           class="form-control">
</div>

<div class="mb-3">
    <label>Origin</label>
    <input type="text"
           name="Origin"
           class="form-control">
</div>

<div class="mb-3">
    <label>Destination</label>
    <input type="text"
           name="Destination"
           class="form-control">
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="Status" class="form-control">
        <option>Scheduled</option>
        <option>Delayed</option>
        <option>Cancelled</option>
        <option>Departed</option>
        <option>Arrived</option>
    </select>
</div>

<button class="btn btn-success">
    Save Flight
</button>
<a class="btn btn-secondary" href="{!! url('/flights')!!}">Back</a>

</form>

</div>

@endsection