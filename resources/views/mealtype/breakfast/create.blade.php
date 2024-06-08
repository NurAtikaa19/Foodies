@extends('layout.master')
@section('title', 'Tambah Menu')

@section('content')
<div class="container">
    <h1>Tambah Menu</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('menu.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="itemName">Nama</label>
                    <input type="text" class="form-control" id="itemName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="itemPrice">Harga</label>
                    <input type="number" class="form-control" id="itemPrice" name="price" required>
                </div>
                <div class="form-group">
                    <label for="itemDescription">Deskripsi</label>
                    <input type="text" class="form-control" id="itemDescription" name="description" required>
                </div>
                <div class="form-group">
                    <label for="itemImage">URL Gambar</label>
                    <input type="text" class="form-control" id="itemImage" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
