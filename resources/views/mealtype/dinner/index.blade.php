@extends('layout.master')
@section('titel')
   Menu Dinner
@endsection

@section('content')

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Foodies Store</a>
            <form class="form-inline" id="formItem">
                <input class="form-control mr-sm-2" type="search" placeholder="Search"  id="keyword" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchItem">Search</button>
            </form>
            <button class="btn btn-primary" id="cart"><i class="fas fa-shopping-cart"></i>(0)</button>
        </nav>
        <div class="row">
            <div class="row col-md-12 mt-2"  id="listBarang"></div>
        </div>
    </div>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        var items = [
            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpg'],
            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpg'],
            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],
            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpg']
        ];

        var itemContainer = document.getElementById("listBarang");
        var cartButton = document.getElementById("cart");
        var itemCount = 0;
       
        function renderItems(itemsToRender) {
            itemContainer.innerHTML = "";    
            itemsToRender.forEach(function(item) {
                var itemDiv = document.createElement("div");
                itemDiv.classList.add("col-4", "mt-2");
                itemDiv.innerHTML = `
                    <div class="card" style="width: 18rem;">
                        <img src="${item[4]}" class="card-img-top" height="200px" width="200px" alt="${item[1]}">
                        <div class="card-body">
                            <h5 class="card-title" id="itemName">${item[1]}</h5>
                            <p class="card-text" id="itemDesc">${item[3]}</p>
                            <p class="card-text">Rp ${item[2]}</p>
                            <a href="#" class="btn btn-primary addToCart">Tambahkan ke keranjang</a>
                        </div>
                    </div>
                `;
    
               
                itemContainer.appendChild(itemDiv);
            });
   
            var addToCartButtons = document.querySelectorAll(".addToCart");
            addToCartButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                  window.location.href = '/keranjang';
                    itemCount++;
                    cartButton.innerHTML = `<i class="fas fa-shopping-cart"></i>(${itemCount})`;
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
    </script>
 
@endsection
