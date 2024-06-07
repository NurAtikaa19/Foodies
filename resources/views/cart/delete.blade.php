<!-- delete.blade.php -->

@extends('layout.master')

@section('title', 'Delete Item')

@section('content')
    <h1>Delete Item from Cart</h1>

    <p>Are you sure you want to delete the following item from your cart?</p>
    <p>Name: {{ $item->name }}</p>
    <p>Quantity: {{ $item->quantity }}</p>
    <p>Price: {{ $item->price }}</p>

    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
@endsection
