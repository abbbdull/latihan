@extends('layout.temp')
@section('content')
    <style>
        #people {
            color: #000;
            /* Mengatur warna teks menjadi hitam pekat */
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .btn-animate {
            animation: pulse 1s infinite;
        }

        .btn-animate {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-animate:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .btn-pulse {
            animation: pulse 1s infinite;
        }

        .btn-animate {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-animate:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-sm-10 offset-md-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="process text-center active">
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
            <div class="row">
                <div class="col-lg-8">
                    <form method="post" class="colorlib-form">
                        <h2>Billing Details</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Select Province</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="people" class="form-control">
                                            <option value="#">Select Province</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="people">Select City</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="city" class="form-control">
                                            <!-- Options will be populated by the AJAX request -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="companyname">Company Name</label>
                                    <input type="text" id="companyname" class="form-control" placeholder="Company Name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname">Address</label>
                                    <input type="text" id="address" class="form-control"
                                        placeholder="Enter Your Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="address2" class="form-control" placeholder="Second Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">Zip/Postal Code</label>
                                    <input type="text" id="zippostalcode" class="form-control"
                                        placeholder="Zip / Postal">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Phone">Phone Number</label>
                                    <input type="text" id="zippostalcode" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio"> Create an Account? </label>
                                        <label><input type="radio" name="optradio"> Ship to different address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" id="save-address-btn"
                         class="btn btn-primary btn-pulse">Save</a>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-detail">
                                <h2>Cart Total</h2>
                                <ul>
                                    <li>
                                        <span>Subtotal</span> <span>$100.00</span>
                                        <ul>
                                            <li><span>1 x Product Name</span> <span>$99.00</span></li>
                                            <li><span>1 x Product Name</span> <span>$78.00</span></li>
                                        </ul>
                                    </li>
                                    <li><span>Shipping</span> <span>$0.00</span></li>
                                    <li><span>Order Total</span> <span id="order-total">$180.00</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="w-100"></div>

                        <div class="col-md-12">
                            <div class="cart-detail">
                                <h2>Payment Method</h2>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio"> Direct Bank Tranfer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio"> Check Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio"> Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value=""> I have read and accept the terms
                                                and conditions</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p><a href="{{ route('complete') }}" class="btn btn-primary btn-animate">
                                    Order Complete
                                </a></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 text-center">

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-addtocheckout').on('click', function(e) {
                e.preventDefault(); // Mencegah aksi default

                // Ambil nilai subtotal
                var subtotal = $('#subtotal').text();

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: '{{ route('saveSubtotal') }}', // Gantilah dengan route yang sesuai
                    type: 'POST',
                    data: {
                        subtotal: subtotal,
                        _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan
                    },
                    success: function(response) {
                        // Redirect ke halaman checkout setelah subtotal disimpan
                        window.location.href = `/checkout/${id}`;

                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        // Ambil nilai subtotal dari localStorage
        var subtotal = localStorage.getItem('subtotal');

        if (subtotal) {
            // Tampilkan subtotal pada halaman checkout
            document.querySelector('.cart-detail ul li span').innerText = '$' + subtotal;
        }

        $(document).ready(function() {
            // Ambil subtotal dari sessionStorage
            var cartSubtotal = sessionStorage.getItem('cartSubtotal');

            // Perbarui elemen subtotal di halaman checkout
            if (cartSubtotal) {
                $('.cart-detail span').first().text(cartSubtotal); // Memperbarui elemen subtotal
            }

            // Anda bisa juga menambahkan logika lain untuk menghitung dan memperbarui total pesanan
        });

        function updateSubtotal() {
            var subtotal = 0;

            // Iterasi setiap elemen dengan kelas .total-price untuk menghitung subtotal
            $('.total-price').each(function() {
                var itemTotal = parseFloat($(this).text().replace(/[^0-9.-]+/g, "")); // Hapus karakter non-numerik
                subtotal += itemTotal;
            });

            // Perbarui subtotal di UI
            $('#subtotal').text(subtotal.toFixed(2));

            // Simpan subtotal di localStorage atau sessionStorage untuk digunakan di halaman checkout
            sessionStorage.setItem('cartSubtotal', subtotal.toFixed(2));


        }

        $(document).ready(function() {
            // Ambil subtotal dari sessionStorage
            var cartSubtotal = sessionStorage.getItem('cartSubtotal');

            // Perbarui elemen subtotal di halaman checkout
            if (cartSubtotal) {
                $('#checkout-subtotal').text(cartSubtotal);
            }

            // Anda bisa menghitung dan memperbarui total pesanan jika diperlukan
        });
        $('#checkout-button').on('click', function() {
            var id = $(this).data('id'); // Ambil ID dari atribut data
            window.location.href = `/checkout/${id}`;
        });
        $('#city').hide();
        $.ajax({
            url: 'http://localhost/latihan7/provinces', // Ganti dengan URL endpoint Laravel Anda
            type: 'GET',
            beforeSend: function() {
                $('#city').hide(); // Tampilkan indikator loading
            },
            success: function(response) {
                var provinces = response.rajaongkir.results;
                var $select = $('#people');
                console.log(provinces)
                $select.empty();
                $select.append('<option value="#">Select Province</option>');
                $.each(provinces, function(index, province) {
                    $select.append('<option value="' + province.province_id + '">' + province.province +
                        '</option>');
                });
            },
            error: function(error) {
                console.error('Error fetching provinces:', error);
            },
            complete: function() {
                $('#city').show(); // Sembunyikan indikator loading
            }
        });

        function fetchCities(provinceId) {
            $.ajax({
                url: 'http://localhost/latihan7/city', // Ganti dengan URL endpoint Laravel Anda
                type: 'GET',
                data: {
                    province: provinceId
                },
                success: function(response) {
                    var city = response.rajaongkir.results;
                    var $select = $('#city');
                    console.log(city)
                    $select.empty();
                    $select.append('<option value="#">Select City</option>');
                    $.each(city, function(index, city) {
                        $select.append('<option value="' + city.city_id + '">' + city.city_name +
                            '</option>');
                    });
                },
                error: function(error) {
                    console.error('Error fetching city:', error);
                },
            complete: function() {
                $('#city').show(); // Sembunyikan indikator loading
            }
            });
        }

        // Example usage: Fetch cities when a province is selected
        $('#people').change(function() {
            var provinceId = $(this).val();
            console.log(provinceId)
            if (provinceId !== '#') {

                    $('#city').hide(); // Tampilkan indikator loading

                fetchCities(provinceId);
            }
        });

        $(document).ready(function() {
    // Ketika tombol diklik
    $('#fetchProfile').click(function() {
        // Mengambil profil data dari API
        $.ajax({
            url: 'http://localhost/latihan7/api/profil', // Ganti dengan URL endpoint API Anda
            type: 'GET',
            data: { user_id: 1 }, // Ganti dengan ID pengguna yang ingin diambil
            success: function(response) {
                if (response.status === 'success') {
                    // Menampilkan data profil di dalam elemen form
                    $('#firstname').val(response.data.first_name);
                    $('#lastname').val(response.data.last_name);
                    $('#company').val(response.data.company);
                    $('#address').val(response.data.address);
                    $('#zippostalcode').val(response.data.postal_code);
                    $('#phonenumber').val(response.data.phone_number);

                    // Mengisi select dropdown untuk provinsi dan kota
                    $('#idprovince').val(response.data.id_province); // Asumsi `id_province` adalah nilai yang valid
                    $('#idcity').val(response.data.id_city); // Asumsi `id_city` adalah nilai yang valid

                    // Tampilkan pesan sukses menggunakan Swal Fire
                    Swal.fire({
                        title: 'Data Profil Berhasil Diambil!',
                        icon: 'success',
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal Mengambil Data Profil',
                        text: 'Data profil tidak ditemukan.',
                        icon: 'error',
                    });
                }
            },
            error: function(error) {
                console.error('Error fetching profile:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat mengambil data profil.',
                    icon: 'error',
                });
            }
        });
    });
});
    </script>
@endsection
