<?php

namespace App\Services;

use App\Models\Pet;

class PetService extends BaseService
{
    public function __construct()
    {
        $this->model = new Pet();
    }
    
    public function getAvailablePets()
    {
        return Pet::where('is_available', true)->get();
    }
    
    public function getPetsByType($type)
    {
        return Pet::where('type', $type)->get();
    }
    
    public function search($filters = [])
    {
        $query = Pet::query();
        
        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }
        
        if (isset($filters['breed'])) {
            $query->where('breed', 'like', '%' . $filters['breed'] . '%');
        }
        
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        
        if (isset($filters['is_available']) && is_bool($filters['is_available'])) {
            $query->where('is_available', $filters['is_available']);
        }
        
        if (isset($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('breed', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        return $query->get();
    }
    
    public function updateAvailability($id, $available)
    {
        $pet = $this->findOrFail($id);
        $pet->update(['is_available' => $available]);
        return $pet;
    }
    
    public function getPetStats()
    {
        return [
            'total' => Pet::count(),
            'available' => Pet::where('is_available', true)->count(),
            'by_type' => Pet::select('type')
                ->selectRaw('COUNT(*) as count')
                ->groupBy('type')
                ->get()
                ->pluck('count', 'type')
                ->toArray()
        ];
    }
}