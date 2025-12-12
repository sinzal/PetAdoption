<?php

namespace App\Services;

abstract class BaseService
{
    protected $model;
    
    public function getAll($with = [])
    {
        $query = $this->model;
        
        if (!empty($with)) {
            $query = $query::with($with);
        } else {
            $query = $query::query();
        }
        
        return $query->get();
    }
    
    public function find($id, $with = [])
    {
        $query = $this->model;
        
        if (!empty($with)) {
            $query = $query::with($with);
        }
        
        return $query->find($id);
    }
    
    public function findOrFail($id, $with = [])
    {
        $query = $this->model;
        
        if (!empty($with)) {
            $query = $query::with($with);
        }
        
        return $query->findOrFail($id);
    }
    
    public function create(array $data)
    {
        return $this->model::create($data);
    }
    
    public function update($id, array $data)
    {
        $record = $this->findOrFail($id);
        $record->update($data);
        return $record;
    }
    
    public function delete($id)
    {
        $record = $this->findOrFail($id);
        return $record->delete();
    }
    
    public function paginate($perPage = 15, $with = [])
    {
        $query = $this->model;
        
        if (!empty($with)) {
            $query = $query::with($with);
        } else {
            $query = $query::query();
        }
        
        return $query->paginate($perPage);
    }
}