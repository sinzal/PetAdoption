<?php

namespace App\Services;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class AdoptionService extends BaseService
{
    public function __construct()
    {
        $this->model = new Adoption();
    }
    
    public function submitAdoption($petId, array $data)
    {
        $pet = Pet::findOrFail($petId);
        
        if (!$pet->is_available) {
            throw new \Exception('Pet is not available for adoption');
        }
        
        $data['pet_id'] = $petId;
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';
        
        return Adoption::create($data);
    }
    
    public function approveAdoption($adoptionId)
    {
        $adoption = $this->findOrFail($adoptionId);
        
        if ($adoption->status === 'approved') {
            throw new \Exception('Adoption already approved');
        }
        
        $adoption->update([
            'status' => 'approved',
            'approved_at' => now()
        ]);
        
        // Mark pet as unavailable
        $pet = Pet::find($adoption->pet_id);
        if ($pet) {
            $pet->update(['is_available' => false]);
        }
        
        return $adoption;
    }
    
    public function rejectAdoption($adoptionId)
    {
        $adoption = $this->findOrFail($adoptionId);
        
        if ($adoption->status === 'rejected') {
            throw new \Exception('Adoption already rejected');
        }
        
        $adoption->update([
            'status' => 'rejected',
            'rejected_at' => now()
        ]);
        
        return $adoption;
    }
    
    public function getUserAdoptions($userId)
    {
        return Adoption::with('pet')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    public function getAdoptionsByStatus($status)
    {
        return Adoption::with(['pet', 'user'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    public function getAdoptionStats()
    {
        return [
            'total' => Adoption::count(),
            'pending' => Adoption::where('status', 'pending')->count(),
            'approved' => Adoption::where('status', 'approved')->count(),
            'rejected' => Adoption::where('status', 'rejected')->count(),
        ];
    }
}