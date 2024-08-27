@extends('layout.temp')
@section('content')
    <style>
        /* Style tombol */
        #sendMessageButton {
            display: flex;
            align-items: center;
            background-color: #000000;
            /* Warna latar belakang default */
            color: white;
            /* Warna teks default */
            border: none;
            padding: 8px 16px;
            /* Mengurangi padding untuk mengecilkan tombol */
            border-radius: 4px;
            /* Mengurangi radius sudut untuk tombol yang lebih kecil */
            font-size: 14px;
            /* Mengurangi ukuran font untuk tombol yang lebih kecil */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            /* Transisi untuk efek hover */
        }

        /* Style ikon */
        #sendMessageButton i {
            margin-right: 6px;
            /* Mengurangi jarak antara ikon dan teks */
            transition: color 0.3s;
            /* Transisi untuk perubahan warna ikon */
        }

        /* Efek hover */
        #sendMessageButton:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat hover */
            transform: scale(1.05);
            /* Mengurangi efek zoom tombol saat hover */
        }

        #sendMessageButton:hover i {
            color: #ffd700;
            /* Warna ikon saat hover */
        }

        /* Efek bounce-to-top */
        .hvr-bounce-to-top {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
            /* Fix for iOS */
            -ms-transform: translateZ(0);
            /* Fix for IE */
            transform: translateZ(0);
            /* Fix for modern browsers */
        }

        .hvr-bounce-to-top:hover,
        .hvr-bounce-to-top:focus,
        .hvr-bounce-to-top:active {
            -webkit-transform: translateY(-4px);
            /* Mengurangi gerakan vertikal saat hover */
            -ms-transform: translateY(-4px);
            transform: translateY(-4px);
        }

        /* Animasi hover pada form */
        .contact_form {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact_form:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover pada input field */
        .form-control {
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var contactWrap = document.querySelector('.contact-wrap');
            if (contactWrap) {
                contactWrap.classList.add('fade-in');
            }
        });
    </script>
    <style>
        /* Animasi fade-in */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Style untuk form */
        .contact-form {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-form:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover pada tombol */
        #sendMessageButton {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        #sendMessageButton:hover {
            transform: scale(1.05);
            background-color: #0056b3;
        }

        /* Animasi hover pada input field */
        .form-control {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        /* Gaya untuk .contact-wrap */
        .contact-wrap {
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 30px; /* Padding sekitar konten */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            transition: background-color 0.3s ease; /* Efek transisi */
        }

        .contact-wrap h3 {
            margin-bottom: 20px; /* Jarak bawah judul */
            font-size: 1.8rem; /* Ukuran font */
            color: #333; /* Warna teks */
        }

        .contact-form .form-group label {
            font-weight: bold; /* Tebal font label */
            margin-bottom: 5px; /* Jarak bawah label */
        }

        .contact-form .form-control {
            border-radius: 5px; /* Sudut membulat pada input */
            border: 1px solid #ced4da; /* Border */
            padding: 10px; /* Padding dalam input */
        }

        .contact-form .sim-btn {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            border: none; /* Hapus border tombol */
            padding: 10px 20px; /* Padding tombol */
            border-radius: 5px; /* Sudut membulat tombol */
            cursor: pointer; /* Kursor pointer */
            font-size: 1rem; /* Ukuran font tombol */
            transition: background-color 0.3s ease; /* Efek transisi */
        }

        .contact-form .sim-btn:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat hover */
        }
    </style>


    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>
    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Contact Information</h3>
                    <div class="row contact-info-wrap">
                        <div class="col-md-3">
                            <p><span><i class="icon-location"></i></span>Jl. Mutiara 1 No.11, RT.01/RW05, Lembang, Kec.
                                Lembang, Kabupaten Bandung Barat, Jawa Barat 40391<br></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+62 85174095653</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-paperplane"></i></span> <a
                                    href="mailto:info@yoursite.com">tokosepatu@email.com</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-globe"></i></span> <a href="">tokosepatu.id.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-wrap fade-in">
                        <h3>Get In Touch</h3>
                        <form action="#" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" id="fname" class="form-control"
                                            placeholder="Your firstname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" id="lname" class="form-control"
                                            placeholder="Your lastname">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control"
                                            placeholder="Your email address">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject" class="form-control"
                                            placeholder="Your subject of this message">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="15" rows="5" class="form-control"
                                            placeholder="Say something about us"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button id="sendMessageButton" class="sim-btn hvr-bounce-to-top" type="submit">
                                        <i class="bi bi-envelope"></i>Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.5996404226903!2d107.61971585995384!3d-6.819103279521914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1724045177865!5m2!1sen!2sid"
                        width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
