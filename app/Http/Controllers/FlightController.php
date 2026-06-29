<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $flightsQuery = Flight::query();

        if ($search) {
            $flightsQuery->where(function ($query) use ($search) {
                $query->where('id', $search)
                      ->orWhere('FlightNumber', 'like', "%{$search}%")
                      ->orWhere('Airline', 'like', "%{$search}%")
                      ->orWhere('Origin', 'like', "%{$search}%")
                      ->orWhere('Destination', 'like', "%{$search}%")
                      ->orWhere('Status', 'like', "%{$search}%");
            });
        }

        $flights = $flightsQuery->paginate(10);

        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        Flight::create($request->all());

        return redirect('/flights')
                ->with('success', 'Flight Added Successfully');
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.edit', compact('flight'));
    }

    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        $flight->update($request->all());

        return redirect('/flights')
                ->with('success', 'Flight Updated Successfully');
    }

    public function destroy($id)
    {
        Flight::destroy($id);

        return redirect('/flights')
                ->with('success', 'Flight Deleted Successfully');
    }
}