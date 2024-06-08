@extends('layout.master')
@section('title', 'Menu Breakfast')

@section('content')
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Foodies Store</a>
        <form class="form-inline" id="formItem">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" id="keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchItem">Search</button>
        </form>
        <a class="btn btn-primary" id="cart" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i>(0)</a>
    </nav>

    <div class="row mb-4">
        <button class="btn btn-success" data-toggle="modal" data-target="#addItemModal">Tambah Makanan</button>
    </div>

    <div class="row" id="listBarang"></div>

    <!-- Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Tambah Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addItemForm">
                        <div class="form-group">
                            <label for="itemId">ID</label>
                            <input type="text" class="form-control" id="itemId" required>
                        </div>
                        <div class="form-group">
                            <label for="itemName">Nama</label>
                            <input type="text" class="form-control" id="itemName" required>
                        </div>
                        <div class="form-group">
                            <label for="itemPrice">Harga</label>
                            <input type="number" class="form-control" id="itemPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="itemDescription">Deskripsi</label>
                            <input type="text" class="form-control" id="itemDescription" required>
                        </div>
                        <div class="form-group">
                            <label for="itemImage">URL Gambar</label>
                            <input type="text" class="form-control" id="itemImage" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    var items = [
        ['001', 'Bubur Ayam', 15000, 'Bubur Ayam Spesial', 'https://th.bing.com/th?id=OIP.Ucr2le49PT2U3z3CIKIGNQAAAA&w=250&h=250&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2'],
        ['002', 'Nasi Goreng', 200000, 'Nasi Goreng Spesial', 'https://th.bing.com/th/id/R.2b29c1d28a67882516a37e19686f2059?rik=Cex2CHRiiW70yQ&riu=http%3a%2f%2fwww.agrowindo.com%2fwp-content%2fuploads%2f2017%2f06%2fPeluang-usaha-nasi-goreng-seafood.jpg&ehk=w0JEpEeAAoN335cUhyOIN1kDHExHcVTqTcxebp7%2bcvM%3d&risl=&pid=ImgRaw&r=0.jpg'],
        ['003', 'Mie Goreng', 10000, 'Indomie Goreng Spesial', 'https://th.bing.com/th/id/OIP.-hqr8b1zbJilFojbjJjJfwHaFF?rs=1&pid=ImgDetMain.jpeg'],
    ];

    var itemContainer = document.getElementById("listBarang");
    var cartButton = document.getElementById("cart");
    var itemCount = 0;
    var cart = [];

    function renderItems(itemsToRender) {
        itemContainer.innerHTML = "";    
        itemsToRender.forEach(function(item) {
            var itemDiv = document.createElement("div");
            itemDiv.classList.add("col-4", "mt-2");
            itemDiv.innerHTML = `
                <div class="card" style="width: 18rem;">
                    <img src="${item[4]}" class="card-img-top" height="200px" width="200px" alt="${item[1]}">
                    <div class="card-body">
                        <h5 class="card-title">${item[1]}</h5>
                        <p class="card-text">${item[3]}</p>
                        <p class="card-text">Rp ${item[2]}</p>
                        <button class="btn btn-primary addToCart" data-id="${item[0]}">Tambahkan ke keranjang</button>
                    </div>
                </div>
            `;

            itemContainer.appendChild(itemDiv);
        });

        var addToCartButtons = document.querySelectorAll(".addToCart");
        addToCartButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var itemId = button.getAttribute("edit");
                var selectedItem = items.find(item => item[0] === itemId);
                cart.push(selectedItem);
                itemCount++;
                cartButton.innerHTML = `<i class="fas fa-shopping-cart"></i>(${itemCount})`;
                window.location.href = '/edit'; // Redirect to cart page
            });
        });
    }

    renderItems(items);

    var formItem = document.getElementById("formItem");
    formItem.addEventListener("submit", function(event) {
        event.preventDefault();
        var keyword = document.getElementById("keyword").value.toLowerCase(); 
        var filteredItems = items.filter(function(item) {
            return item[1].toLowerCase().includes(keyword);
        });
        renderItems(filteredItems);
    });

    var addItemForm = document.getElementById("addItemForm");
    addItemForm.addEventListener("submit", function(event) {
        event.preventDefault();
        var itemId = document.getElementById("itemId").value;
        var itemName = document.getElementById("itemName").value;
        var itemPrice = document.getElementById("itemPrice").value;
        var itemDescription = document.getElementById("itemDescription").value;
        var itemImage = document.getElementById("itemImage").value;

        var newItem = [itemId, itemName, itemPrice, itemDescription, itemImage];
        items.push(newItem);
        renderItems(items);
        $('#addItemModal').modal('hide');
    });
</script>
@endsection
