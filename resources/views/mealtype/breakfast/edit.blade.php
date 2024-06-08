@extends('layout.master')
@section('title', 'Edit Menu')

@section('content')
<div class="container">
    <h1>Edit Menu</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="itemName">Nama</label>
                    <input type="text" class="form-control" id="itemName" name="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-group">
                    <label for="itemPrice">Harga</label>
                    <input type="number" class="form-control" id="itemPrice" name="price" value="{{ $menu->price }}" required>
                </div>
                <div class="form-group">
                    <label for="itemDescription">Deskripsi</label>
                    <input type="text" class="form-control" id="itemDescription" name="description" value="{{ $menu->description }}" required>
                </div>
                <div class="form-group">
                    <label for="itemImage">URL Gambar</label>
                    <input type="text" class="form-control" id="itemImage" name="image" value="{{ $menu->image }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
