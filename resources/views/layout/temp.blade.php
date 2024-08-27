<!DOCTYPE HTML>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wnd</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">

        @include('layout.navbar')

        @yield('content')

        @include('layout.footer')

    </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

   <!-- jQuery -->
   <script src="{{ asset('/js/jquery.min.js') }}"></script>
   <!-- popper -->
   <script src="{{ asset('/js/popper.min.js') }}"></script>
   <!-- bootstrap 4.1 -->
   <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
   <!-- jQuery easing -->
   <script src="{{ asset('/js/jquery.easing.1.3.js') }}"></script>
   <!-- Waypoints -->
   <script src="{{ asset('/js/jquery.waypoints.min.js') }}"></script>
   <!-- Flexslider -->
   <script src="{{ asset('/js/jquery.flexslider-min.js') }}"></script>
   <!-- Owl carousel -->
   <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
   <!-- Magnific Popup -->
   {{-- <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
   <script src="{{ asset('/js/magnific-popup-options.js') }}"></script> --}}
   <!-- Date Picker -->
   <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
   <!-- Stellar Parallax -->
   <script src="{{ asset('/js/jquery.stellar.min.js') }}"></script>
   <!-- Main -->
   <script src="{{ asset('/js/main.js') }}"></script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   @yield('js')

</body>

</html>
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Menampilkan notifikasi jika sesi success ada
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Berhasil Masuk!',
                    confirmButtonColor: '#1a75ff'
                });
            @endif

            $('.closed').click(function(e) {
                e.preventDefault(); // Mencegah aksi default dari link
                $(this).closest('.product-cart').remove(); // Menghapus elemen .product-cart terdekat
            });

            var user_id = {{ session('id') }}; // Ganti dengan ID pengguna yang sesuai

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
                                <div class="product-img" style="background-image: url(${item.gambar_url});">
                                </div>
                                <div class="display-tc">
                                    <h3>${item.nama_produk}</h3>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">${item.harga_produk}</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <input type="text" id="quantity-${item.id}" name="quantity"
                                        class="form-control input-number text-center" value="${item.jumlah}" min="1"
                                        max="100">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">${item.total}</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="#" class="closed" data-id="${item.id}"></a>
                                </div>
                            </div>
                        </div> <br>
                    `;
                        cartList.append(cartItem);
                    });

                    // Handle remove button click
                    $('.closed').click(function(e) {
                        e.preventDefault();
                        var itemId = $(this).data('id');

                        // Tampilkan konfirmasi dengan SweetAlert2
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
                                // Jika dikonfirmasi, lakukan penghapusan
                                $.ajax({
                                    url: 'http://localhost/latihan6/api/remove/cart',
                                    type: 'POST',
                                    data: {
                                        id: itemId
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        Swal.fire(
                                            'Removed!',
                                            'Item has been removed from your cart.',
                                            'success'
                                        );
                                        location.reload(); // Refresh halaman untuk memperbarui daftar
                                    },
                                    error: function(xhr) {
                                        Swal.fire(
                                            'Error!',
                                            'Failed to remove item.',
                                            'error'
                                        );
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
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
        });
    </script>
@endsection
