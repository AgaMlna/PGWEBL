<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
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
            'name'        => 'required|unique:points,name',
            'description' => 'required',
            'geom_point'  => 'required',
        ],
        [
            'name.required'       => 'Name is required',
            'name.unique'         => 'Name already exists',
            'description.require' => 'Description is required',
            'geom_point.require' => 'Geometry points is required',
        ]);

        // Prepare data for insertion
        $data = [
            'geom'        => $request->input('geom_point'),
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ];

        // Create data
        $this->points->create($data);


        //Redicted to map
        return redirect()->route('map')->with('success', 'Point has been added');
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
