@extends('layout.temp')
@section('content')
    <style>
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group button {
            border: none;
            background-color: #f0f0f0;
            color: #333;
            padding: 5px 10px;
            font-size: 14px;
            width: 40px;
            height: 40px;
            border-radius: 2px;
            cursor: pointer;
            flex: 0 0 auto;
        }

        .input-group button:hover {
            background-color: #ddd;
        }

        .input-group input {
            text-align: center;
            width: 50px;
            margin: 0 5px;
            padding: 5px;
            flex: 1;
        }

        .product-cart .one-eight,
        .product-name .one-eight {
            width: 201px;
            height: 100px !important;
            display: table;
            float: left;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Shopping Cart</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-md-10 offset-md-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3>Checkout</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Order Complete</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Product Details</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Price</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Quantity</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Remove</span>
                        </div>
                    </div>
                    <div id="cart-list">

                        <div class="product-cart d-flex ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="#">
                                    <div class="row form-group">
                                        <div class="col-sm-9">
                                            <input type="text" name="quantity" class="form-control input-number"
                                                placeholder="Your Coupon Number...">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Subtotal:</span> <span>200.00</span></p>
                                        <p><span>Delivery:</span> <span>0.00</span></p>
                                        <p><span>Discount:</span> <span>45.00</span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p>Subtotal: <span id="subtotal">0.00</span></p>
                                    </div>
                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-addtocheckout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-3 mb-4 text-center">
                    <div class="product-entry border">
                        <a href="#" class="prod-img">
                            <img src="images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
                        </a>
                        <div class="desc">
                            <h2><a href="#">Women's Boots Shoes Maca</a></h2>
                            <span class="price">139.00</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.closed').click(function(e) {
                e.preventDefault(); // Mencegah aksi default dari link
                $(this).closest('.product-cart').remove(); // Menghapus elemen .product-cart terdekat
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var user_id = {{ session('id') }}; // Ganti dengan ID pengguna yang sesuai

            function loadCart() {
                $.ajax({
                    url: 'http://localhost/latihan6/api/list/Cart',
                    type: 'POST',
                    data: {
                        id_user: user_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var cartList = $('#cart-list');
                        cartList.empty(); // Hapus item lama

                        response.forEach(function(item) {
                            var cartItem = `
                            <div class="product-cart d-flex">
                                <div class="one-forth">
                                    <div class="product-img" style="background-image: url(${item.gambar_url});"></div>
                                    <div class="display-tc">
                                        <h3>${item.nama_produk}</h3>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price" id="price-${item.id}">${item.harga_produk}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="input-group">
                                        <button class="updatequantity" data-id="${item.id}" data-action="minus">-</button>
                                        <input type="text" id="quantity-${item.id}" name="quantity" class="form-control input-number text-center" value="${item.jumlah}" min="1" max="100">
                                        <button class="updatequantity" data-id="${item.id}" data-action="plus">+</button>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="total-price" id="total-${item.id}">${item.total}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="#" class="closed" data-id="${item.id}"></a>
                                    </div>
                                </div>
                            </div><br>`;
                            cartList.append(cartItem);
                        });

                        // Handle remove button click
                        $('.closed').click(function(e) {
                            e.preventDefault();
                            var itemId = $(this).data('id');

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Do you want to remove this item from your cart?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, remove it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: 'http://localhost/latihan6/api/remove/cart',
                                        type: 'POST',
                                        data: {
                                            id: itemId
                                        },
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]')
                                                .attr('content')
                                        },
                                        success: function(response) {
                                            Swal.fire(
                                                'Removed!',
                                                'Item has been removed from your cart.',
                                                'success'
                                            );
                                            loadCart
                                        (); // Refresh daftar keranjang
                                        },
                                        error: function(xhr) {
                                            Swal.fire(
                                                'Error!',
                                                'Failed to remove item.',
                                                'error'
                                            );
                                        }
                                    });
                                } else if (result.dismiss === Swal.DismissReason
                                    .cancel) {
                                    Swal.fire(
                                        'Cancelled',
                                        'Your item is safe :)',
                                        'error'
                                    );
                                }
                            });
                        });
                    },
                    error: function(xhr) {
                        alert('Failed to load cart data.');
                    }
                });
            }

            $('#cart-list').on('click', '.updatequantity', function() {
                var itemId = $(this).data('id');
                var action = $(this).data('action');

                var $quantityInput = $(this).siblings('input');
                var currentQuantity = parseInt($quantityInput.val(), 10);

                var $priceSpan = $(`#price-${itemId}`);
                var pricePerUnit = parseFloat($priceSpan.text().replace(/[^0-9.-]+/g,
                "")); // Mengambil harga unit

                if (action === 'minus' && currentQuantity > 1) {
                    currentQuantity--;
                } else if (action === 'plus') {
                    currentQuantity++;
                }

                $quantityInput.val(currentQuantity);

                var newTotal = (pricePerUnit * currentQuantity).toFixed(2); // Menghitung total harga baru
                $(`#total-${itemId}`).text(newTotal);

                $.ajax({
                    url: 'http://localhost/latihan6/api/updatequantity',
                    type: 'POST',
                    data: {
                        keranjang_id: itemId,
                        quantity: currentQuantity,
                        total: newTotal
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Success:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            loadCart(); // Load cart items on page load
        });

        $(document).ready(function() {
            var userId = {{ session('id') }}; // Ganti dengan ID pengguna yang sesuai

            function fetchSubtotal() {
                $.ajax({
                    url: 'http://localhost/latihan6/api/getsubtotal',
                    type: 'POST',
                    data: {
                        user_id: userId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#subtotal').text(response.subtotal);
                        } else {
                            alert('Failed to calculate subtotal.');
                        }
                    },
                    error: function(xhr) {
                        alert('Failed to fetch subtotal.');
                    }
                });
            }

            fetchSubtotal(); // Memanggil fungsi untuk mendapatkan subtotal
        });
    </script>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-addtocheckout').click(function(e) {
                e.preventDefault();

                // Ambil token API dari session atau tempat lain
                var apiToken = "{{ session('api_token') }}";
                var isi_url = "http://localhost/latihan6/api/checkout"; // Pastikan URL-nya benar

                // Data yang akan dikirimkan dalam permintaan POST
                var data = {
                    users: "{{ session('id') }}", // Ganti dengan nilai yang sesuai atau ambil dari input form
                    produks: {{ $produk['id'] }}, // Ganti dengan nilai yang sesuai atau ambil dari input form
                    quantity: 1, // Ganti dengan nilai yang sesuai atau ambil dari input form
                    harga: {{ $produk['harga'] }} // Ganti dengan nilai yang sesuai atau ambil dari input form
                };

                alert('Data yang akan dikirim: ' + JSON.stringify(data));

                $.ajax({
                    url: isi_url,
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + apiToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json', // Tetap gunakan JSON jika server mengharapkan JSON
                    },
                    data: JSON.stringify(data), // Mengonversi objek data ke format JSON
                    success: function(response) {
                        alert('Item added to cart!');
                        window.location.href = "{{ route('checkout') }}";
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log pesan kesalahan untuk debugging
                        alert('Failed to add item to cart. Please log in.');
                    }
                });

            });
        });

    </script>
@endsection
