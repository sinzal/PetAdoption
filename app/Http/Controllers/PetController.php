<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();
        return view('admin.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
            'description' => 'required|string',
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index')
            ->with('success', 'Pet added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('admin.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('admin.pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
            'description' => 'required|string',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')
            ->with('success', 'Pet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')
            ->with('success', 'Pet deleted successfully!');
    }
}