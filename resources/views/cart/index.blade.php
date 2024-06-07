<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-action {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Foodies Store</a>
        <form class="form-inline" id="formItem">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" id="keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchItem">Search</button>
        </form>
        <button class="btn btn-primary" id="cart"><i class="fas fa-shopping-cart"></i>(0)</button>
    </nav>
    
    <div class="container">
        <h1 class="mb-4">Daftar Beli Makanan</h1>
        <div class="row mb-4">
            <button class="btn btn-success" data-toggle="modal" data-target="#addItemModal">Add Item</button>
        </div>
        <div class="row" id="cartItems">
            <!-- Cards will be appended here -->
        </div>
        <div class="col-md-4">
            <h4>Total: <span id="totalAmount">0</span></h4>
            <button class="btn btn-danger btn-block" id="clearCart">Clear Cart</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item to Cart</h5>
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
                            <label for="itemQuantity">Quantity</label>
                            <input type="number" class="form-control" id="itemQuantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+P8aZrVcpz8kGnFsEp0u70XXvOlm8fF5P9yKXWwWaaGP/n3edkmU1Q8z" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-+iGgsIMlHVE5MNJ0vWqBh1aEQw1zP9mbJ26dekbX5k6Sz0n5DTG4Fj0tvlxtn1j1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCpV8D+5n9d4n9+gV5Jvo1jBtSTAv/hMab1B" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#addItemForm').on('submit', function(event) {
                event.preventDefault();
                var itemId = $('#itemId').val();
                var itemName = $('#itemName').val();
                var itemPrice = $('#itemPrice').val();
                var itemQuantity = $('#itemQuantity').val();
                addToCart(itemId, itemName, itemPrice, itemQuantity);
                $('#addItemModal').modal('hide');
            });

            $('#clearCart').on('click', function() {
                $('#cartItems').empty();
                updateTotalAmount();
            });
        });

        function addToCart(itemId, itemName, itemPrice, itemQuantity) {
            var cartItem = {
                id: itemId,
                name: itemName,
                price: itemPrice,
                quantity: itemQuantity
            };

            var newCard = `<div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${itemName}</h5>
                        <p class="card-text">ID: ${itemId}</p>
                        <p class="card-text">Harga: ${itemPrice}</p>
                        <p class="card-text">Jumlah: ${itemQuantity}</p>
                        <button class="btn btn-danger btn-action" onclick="removeItem(this)">Delete</button>
                    </div>
                </div>
            </div>`;

            $('#cartItems').append(newCard);
            updateTotalAmount();
        }

        function removeItem(element) {
            $(element).closest('.col-md-4').remove();
            updateTotalAmount();
        }

        function updateTotalAmount() {
            var totalAmount = 0;
            $('#cartItems .card').each(function() {
                var price = parseFloat($(this).find('.card-text:nth-child(3)').text().split(': ')[1]);
                var quantity = parseFloat($(this).find('.card-text:nth-child(4)').text().split(': ')[1]);
                totalAmount += price * quantity;
            });
            $('#totalAmount').text(totalAmount);
        }
    </script>
</body>
</html>
