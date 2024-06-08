@extends('layout.master')
@section('title', 'Menu breakfast')

@section('content')
<div class="container">
    <h1>Menu Dinner</h1>
    <div class="row">
        @foreach($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $menu->image }}" class="card-img-top" alt="{{ $menu->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text">{{ $menu->description }}</p>
                    <p class="card-text">Rp {{ $menu->price }}</p>
                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
