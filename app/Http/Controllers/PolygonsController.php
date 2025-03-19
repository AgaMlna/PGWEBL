<?php

namespace App\Http\Controllers;

use App\Models\PolygonsModel; // Pastikan model sesuai dengan nama file di models
use Illuminate\Http\Request;

class PolygonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Map',
        ];

        return view('map', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create'); // Pastikan ada view untuk membuat polygon
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation request
        $request->validate([
            'name'         => 'required|unique:polygons,name',
            'description'  => 'required',
            'geom_polygon' => 'required',
        ],
        [
            'name.required'         => 'Name is required',
            'name.unique'           => 'Name already exists',
            'description.required'  => 'Description is required',
            'geom_polygon.required' => 'Geometry polygon is required',
        ]);

        // Simpan data ke database
        PolygonsModel::create([
            'geom'        => $request->input('geom_polygon'),
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('map')->with('success', 'Polygon has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
