@extends('layout.temp')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>About</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="colorlib-about">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-sm-6 mb-12">
                    <div class="video colorlib-video" style="background-image: url(images/maples.webp);">
                        <a href="https://youtu.be/QNqWvpw5UFE?si=c8g4RpAbUgHbLQOF"><i class="icon-play3"></i></a>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h2>Clarks Wallabee</h2>
                    <p>The Clarks Wallabee is one of the iconic shoe models from the Clarks brand, known for its distinctive
                        design and exceptional comfort.</p>
                    <p>History and Origins
                        The Clarks Wallabee was introduced in 1967. It was designed by the British shoe company, Clarks,
                        which was founded in 1825.
                        The Wallabee was inspired by the traditional moccasin shoe from North America. Clarks modified the
                        design with a modern twist to create a comfortable and stylish shoe.
                    </p>
                    <p>Design and Features
                        The Wallabee has a moccasin-like design, with a soft, flexible upper that comfortably wraps around
                        the foot.
                        One of the main features of the Clarks Wallabee is the flexible, textured rubber sole. This sole is
                        designed to provide comfort and good grip. Typically, Wallabees are made from high-quality leather
                        or suede. This material gives the shoe an elegant look and increases its durability.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
