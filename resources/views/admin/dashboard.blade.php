@extends('admin.layout')

@section('content')
<h2>Admin Dashboard</h2>

<div class="dashboard-stats">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
        <div style="background: #e3f2fd; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3>{{ $pets->count() }}</h3>
            <p>Total Pets</p>
        </div>
        <div style="background: #e8f5e8; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3>{{ $pets->where('is_available', true)->count() }}</h3>
            <p>Available Pets</p>
        </div>
        <div style="background: #fff3cd; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3>{{ $pets->where('is_available', false)->count() }}</h3>
            <p>Adopted Pets</p>
        </div>
    </div>
</div>

<div class="quick-actions">
    <h3>Quick Actions</h3>
    <div style="display: flex; gap: 1rem; margin-bottom: 2rem;">
        <a href="{{ route('pets.create') }}" class="btn btn-success">Add New Pet</a>
        <a href="{{ route('pets.index') }}" class="btn btn-primary">Manage All Pets</a>
        <a href="{{ route('adoption') }}" class="btn btn-warning">View Frontend</a>
    </div>
</div>

<div class="recent-pets">
    <h3>Recent Pets</h3>
    @if($pets->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Breed</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets->take(5) as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ ucfirst($pet->type) }}</td>
                    <td>{{ $pet->breed }}</td>
                    <td>${{ $pet->price }}</td>
                    <td>
                        @if($pet->is_available)
                            <span style="color: green;">Available</span>
                        @else
                            <span style="color: red;">Adopted</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pets in the system yet. <a href="{{ route('pets.create') }}">Add your first pet!</a></p>
    @endif
</div>
@endsection