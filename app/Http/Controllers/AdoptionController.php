<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Services\AdoptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    protected $adoptionService;
    
    public function __construct(AdoptionService $adoptionService)
    {
        $this->adoptionService = $adoptionService;
    }
    
    public function submit(Request $request)
    {
        // Check if it's an API request
        if ($request->expectsJson() || $request->is('api/*')) {
            // API adoption submission
            $request->validate([
                'pet_id' => 'required|exists:pets,id',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'reason' => 'required|string'
            ]);
            
            try {
                $adoption = $this->adoptionService->submitAdoption(
                    $request->pet_id,
                    $request->all()
                );
                
                return response()->json([
                    'success' => true,
                    'message' => 'Adoption request submitted successfully',
                    'data' => $adoption
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 400);
            }
        }
        
        // Web submission - redirect to cart
        return redirect()->route('cart');
    }
    
    /**
     * Additional methods for both web and API
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            $adoptions = $this->adoptionService->getAll(['pet', 'user']);
            return response()->json([
                'success' => true,
                'data' => $adoptions,
                'count' => $adoptions->count()
            ]);
        }
        
        // Web view for adoptions
        $pets = Pet::where('is_available', true)->get();
        return view('adoptions.index', compact('pets'));
    }
    
    public function show(Request $request, $id)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            try {
                $adoption = $this->adoptionService->findOrFail($id, ['pet', 'user']);
                return response()->json([
                    'success' => true,
                    'data' => $adoption
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Adoption not found'
                ], 404);
            }
        }
        
        // Web view for single adoption
        // You'll need to create this view
        return view('adoptions.show', compact('adoption'));
    }
    
    public function approve(Request $request, $id)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            try {
                $adoption = $this->adoptionService->approveAdoption($id);
                return response()->json([
                    'success' => true,
                    'message' => 'Adoption approved successfully',
                    'data' => $adoption
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 400);
            }
        }
        
        // Web approval
        try {
            $this->adoptionService->approveAdoption($id);
            return redirect()->back()->with('success', 'Adoption approved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function reject(Request $request, $id)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            try {
                $adoption = $this->adoptionService->rejectAdoption($id);
                return response()->json([
                    'success' => true,
                    'message' => 'Adoption rejected successfully',
                    'data' => $adoption
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 400);
            }
        }
        
        // Web rejection
        try {
            $this->adoptionService->rejectAdoption($id);
            return redirect()->back()->with('success', 'Adoption rejected successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function userAdoptions(Request $request)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            $adoptions = $this->adoptionService->getUserAdoptions(Auth::id());
            return response()->json([
                'success' => true,
                'data' => $adoptions,
                'count' => $adoptions->count()
            ]);
        }
        
        // Web view for user adoptions
        $adoptions = $this->adoptionService->getUserAdoptions(Auth::id());
        return view('adoptions.my-adoptions', compact('adoptions'));
    }
    
    public function stats(Request $request)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            $stats = $this->adoptionService->getAdoptionStats();
            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        }
        
        // Web view for stats
        $stats = $this->adoptionService->getAdoptionStats();
        return view('adoptions.stats', compact('stats'));
    }
}