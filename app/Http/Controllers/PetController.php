<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Services\PetService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage; // Added Storage facade

class PetController extends Controller
{
    protected $petService;
    
    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            // API response
            $pets = $this->petService->getAll();
            return response()->json([
                'success' => true,
                'data' => $pets,
                'count' => $pets->count()
            ]);
        }
        
        // Web response
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
     * UPDATED to handle file upload and validation.
     */
    public function store(Request $request)
    {
        // 1. Validation for form data AND the uploaded file
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            // File validation rules: required, file, image, max size (2048 KB = 2MB)
            'image_file' => 'required|file|image|max:2048', 
            'description' => 'required|string',
        ]);

        $data = $request->except('image_file'); // Get all data except the file
        $imagePath = null;
        
        // 2. Handle the file upload
        if ($request->hasFile('image_file')) {
            // Store the file in the 'public/pets' disk and get the file path
            $imagePath = $request->file('image_file')->store('pets', 'public');
            
            // Generate the public URL path for the database column 'image_url'
            $data['image_url'] = Storage::url($imagePath);
        } else {
            // Fallback (though validation should make this unreachable for the required field)
            $data['image_url'] = null; 
        }

        // 3. Create the pet using the massaged data array
        $pet = Pet::create($data);

        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Pet created successfully',
                'data' => $pet
            ], 201);
        }

        return redirect()->route('pets.index')
            ->with('success', 'Pet added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pet $pet)
    {
        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $pet
            ]);
        }
        
        return view('admin.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     * NOTE: You should update this method's view to handle file uploads as well.
     */
    public function edit(Pet $pet)
    {
        return view('admin.pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     * NOTE: This method needs similar file handling/validation updates for the 'image_file' 
     * if you update the 'edit' form, but is left as original here for simplicity.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|url', // Assuming 'edit' form still uses URL
            'description' => 'required|string',
        ]);

        $pet->update($request->all());

        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Pet updated successfully',
                'data' => $pet
            ]);
        }

        return redirect()->route('pets.index')
            ->with('success', 'Pet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pet $pet)
    {
        $pet->delete();

        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'message' => 'Pet deleted successfully'
            ]);
        }

        return redirect()->route('pets.index')
            ->with('success', 'Pet deleted successfully!');
    }
    
    /**
     * Display the product detail page (formerly a closure in routes/web.php).
     */
    public function showProductDetail($id = null)
    {
        if ($id) {
            // If ID is provided, get that specific pet
            $pet = Pet::find($id);
        } else {
            // If no ID, get the first pet (for backward compatibility)
            $pet = Pet::first();
        }
        return view('productdetail1', compact('pet'));
    }

    /**
     * API-specific methods
     */
    public function apiGetAvailable(Request $request)
    {
        $pets = $this->petService->getAvailablePets();
        return response()->json([
            'success' => true,
            'data' => $pets,
            'count' => $pets->count()
        ]);
    }
    
    public function apiGetByType(Request $request, $type)
    {
        $pets = $this->petService->getPetsByType($type);
        return response()->json([
            'success' => true,
            'data' => $pets,
            'count' => $pets->count()
        ]);
    }
    
    public function apiSearch(Request $request)
    {
        $pets = $this->petService->search($request->all());
        return response()->json([
            'success' => true,
            'data' => $pets,
            'count' => $pets->count()
        ]);
    }
    
    public function apiStats(Request $request)
    {
        $stats = $this->petService->getPetStats();
        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }

    public function search(Request $request)
    {
        $query = Pet::query();

        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%')
                  ->orWhere('breed', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->type && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        $pets = $query->get();

        return response()->json([
            'success' => true,
            'html' => view('partials.pet-card', compact('pets'))->render()
        ]);
    }
}