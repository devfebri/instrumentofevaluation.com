@extends('front.master')
@section('contentfront')

<!-- Service Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Skilled Instructors</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">Online Classes</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">Home Projects</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Book Library</h5>
                        <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Service End -->

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Kekayaan Lokal Jambi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Kekayaan Lokal Jambi</li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            {{-- <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('master/img/about.jpg') }}" alt="" style="object-fit: cover;">

        </div>
    </div> --}}
    <div class="col-lg-12 wow fadeInUp" style="text-align: justify;" data-wow-delay="0.3s">
        {{-- <h6 class="section-title bg-white text-start text-primary pe-3">Indikator Pola Pikir</h6> --}}
        <h1 class="mb-4">Kekayaan Lokal Jambi</h1>
        <p class="mb-4">
            Kekayaan lokal Jambi memiliki banyak aspek yang relevan dengan pembelajaran biologi, terutama terkait dengan keanekaragaman hayati dan ekosistemnya. Provinsi Jambi adalah rumah bagi hutan hujan tropis yang kaya, yang menjadi habitat bagi berbagai spesies flora dan fauna. Di dalam hutan ini, terdapat berbagai jenis tumbuhan obat, kayu bernilai ekonomi tinggi, serta spesies hewan endemik seperti harimau sumatera dan orangutan. Pengamatan dan penelitian terhadap ekosistem hutan ini dapat memberikan wawasan mendalam tentang interaksi antar spesies, peran rantai makanan, serta pentingnya pelestarian keanekaragaman hayati.
            <br>
            <br>
            Selain itu, Jambi juga memiliki potensi pertanian yang signifikan yang berkaitan dengan biologi tanaman. Komoditas seperti kopi, karet, dan kelapa sawit tidak hanya memiliki nilai ekonomi, tetapi juga menawarkan kesempatan untuk mempelajari ilmu pertanian, genetik tanaman, dan teknik budidaya yang berkelanjutan. Program pembelajaran yang melibatkan studi lapangan di perkebunan atau hutan dapat memperkaya pemahaman siswa tentang siklus hidup tanaman, proses fotosintesis, serta dampak lingkungan dari praktik pertanian. Dengan demikian, kekayaan lokal Jambi tidak hanya memperkaya pengetahuan biologi tetapi juga mendukung upaya konservasi dan pengelolaan sumber daya alam yang berkelanjutan.
            <br>
            <br>
            Berikut adalah beberapa kekayaan lokal Jambi yang berhubungan dengan pembelajaran biologi:
            <ol>
                <li>Hutan Mangrove</li>
                Hutan mangrove di pesisir Jambi merupakan ekosistem penting yang mendukung keanekaragaman hayati. Mangrove berfungsi sebagai habitat bagi berbagai spesies ikan, burung, dan hewan lainnya. Pembelajaran tentang mangrove dapat mencakup studi tentang adaptasi tanaman terhadap lingkungan salin, peran ekosistem mangrove dalam melindungi pantai dari abrasi, serta pentingnya mangrove dalam menjaga kualitas air.
                <br><br><img src="{{ asset('img/bg4.jpg') }}" class="rounded mx-auto d-block" alt=""><br>

                <li>Danau Tangkas</li>
                Danau Tangkas adalah salah satu danau alami di Jambi yang kaya akan keanekaragaman hayati. Danau ini menjadi habitat bagi berbagai spesies ikan dan tumbuhan air. Pembelajaran di danau ini bisa meliputi studi tentang ekosistem perairan, siklus hidup ikan, serta interaksi antara organisme dalam ekosistem air tawar.
                <br><br><img src="{{ asset('img/bg5.jpg') }}" class="rounded mx-auto d-block" alt=""><br>

                <li>Kebun Nanas Tangkit</li>
                Kebun nanas di daerah Tangkit merupakan contoh pertanian lokal yang dapat menjadi objek studi dalam biologi pertanian. Siswa dapat mempelajari cara budidaya nanas, proses fotosintesis, serta pentingnya tanaman dalam ekosistem pertanian. Kebun ini juga dapat menjadi tempat untuk memahami teknik pengelolaan tanaman yang berkelanjutan.
                <br><br><img src="{{ asset('img/bg6.jpg') }}" class="rounded mx-auto d-block" alt=""><br>

                Kekayaan lokal Jambi ini tidak hanya mendukung pembelajaran biologi, tetapi juga meningkatkan kesadaran akan pentingnya pelestarian alam dan pengelolaan sumber daya yang berkelanjutan.
            </ol>
        </p>
    </div>
</div>
</div>
</div>
<!-- About End -->

@endsection

