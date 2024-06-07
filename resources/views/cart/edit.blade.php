<!-- edit.blade.php -->

@extends('layout.master')

@section('title', 'Edit Item')

@section('content')
    <h1>Edit Item in Cart</h1>

    <form action="{{ route('cart.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $item->name }}" required>
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $item->price }}" step="0.01" required>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
