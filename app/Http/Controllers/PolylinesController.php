<?php

namespace App\Http\Controllers;

use App\Models\PolylinesModel;
use Illuminate\Http\Request;

class PolylinesController extends Controller
{
    protected $polylines;

    public function __construct()
    {
        $this->polylines = new PolylinesModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tittle' => 'Map',
        ];

        return view('map', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create'); // Pastikan ada view form untuk menambahkan data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation request
        $request->validate([
            'name'         => 'required|unique:polylines,name',
            'description'  => 'required',
            'geom_polyline'    => 'required',
        ],
        [
            'name.required'       => 'Name is required',
            'name.unique'         => 'Name already exists',
            'description.required'=> 'Description is required',
            'geom_polyline.required'  => 'Geometry line is required',
        ]);

        // Prepare data for insertion
        $data = [
            'geom'        => $request->input('geom_polyline'),
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ];

        // Create data
        $this->polylines->create($data);

        // Redirect to map
        return redirect()->route('map')->with('success', 'Polyline has been added');
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
