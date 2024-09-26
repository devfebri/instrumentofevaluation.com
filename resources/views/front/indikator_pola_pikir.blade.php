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
                <h1 class="display-3 text-white animated slideInDown">Indikator Pola Pikir</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Indikator Pola Pikir</li>
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
        <h1 class="mb-4">Indikator Pola Pikir</h1>

        <p class="mb-4">Berikut adalah beberapa indikator pola pikir yang dapat membantu mengidentifikasi dan mengevaluasi pola pikir seseorang, baik itu pola pikir tetap (fixed mindset) maupun pola pikir berkembang (growth mindset):

            <ol>
                <li>Respons terhadap Kegagalan</li>
                <ul>
                    <li>Pola Pikir Tetap: Melihat kegagalan sebagai cerminan dari kemampuan pribadi. Cenderung merasa putus asa dan menghindari tantangan di masa depan.</li>
                    <li>Pola Pikir Berkembang: Menganggap kegagalan sebagai kesempatan untuk belajar. Mencari pelajaran dari pengalaman dan tetap berusaha meskipun menghadapi rintangan.</li>
                </ul>
                <li>Pendekatan terhadap Tantangan</li>
                <ul>
                    <li> Pola Pikir Tetap: Menghindari tantangan dan memilih jalur yang aman untuk menghindari risiko kegagalan.</li>
                    <li> Pola Pikir Berkembang: Menyambut tantangan sebagai peluang untuk meningkatkan diri dan mengembangkan keterampilan baru.</li>
                </ul>
                <li>Persepsi terhadap Umpan Balik</li>
                <ul>
                    <li>Pola Pikir Tetap: Menganggap umpan balik sebagai kritik pribadi dan merasa tersinggung atau defensif.</li>
                    <li>Pola Pikir Berkembang: Menerima umpan balik sebagai informasi yang berharga untuk perbaikan dan pengembangan diri.</li>
                </ul>
                <li>Keyakinan terhadap Kemampuan Diri</li>
                <ul>
                    <li> Pola Pikir Tetap: Percaya bahwa kemampuan dan kecerdasan adalah sifat bawaan yang tidak dapat diubah.</li>
                    <li> Pola Pikir Berkembang: Berkeyakinan bahwa usaha dan pembelajaran dapat meningkatkan kemampuan dan kecerdasan.</li>
                </ul>
                <li>Fokus pada Proses vs. Hasil</li>
                <ul>
                    <li>Pola Pikir Tetap: Terlalu fokus pada hasil akhir dan prestasi, sering kali mengabaikan proses belajar.</li>
                    <li>Pola Pikir Berkembang: Menghargai proses belajar dan usaha yang dilakukan, serta memahami bahwa hasil adalah konsekuensi dari proses tersebut.</li>
                </ul>
                <li>Resilience (Ketahanan)</li>
                <ul>
                    <li>Pola Pikir Tetap: Mudah menyerah ketika menghadapi kesulitan, merasa tidak mampu mengatasi rintangan.</li>
                    <li>Pola Pikir Berkembang: Menunjukkan ketahanan dan kemampuan untuk bangkit kembali setelah mengalami kesulitan.</li>
                </ul>
                <li>Sikap terhadap Kolaborasi</li>
                <ul>
                    <li>Pola Pikir Tetap: Merasa terancam oleh keberhasilan orang lain dan bersaing secara negatif.</li>
                    <li>Pola Pikir Berkembang: Mendorong kolaborasi, berbagi ide, dan belajar dari orang lain.</li>
                </ul>
            </ol>
            <h5>Kesimpulan</h5>
            Indikator-indikator ini dapat digunakan untuk mengevaluasi dan memahami pola pikir seseorang. Dengan mengenali pola pikir yang dominan, individu dapat mengambil langkah untuk mengembangkan pola pikir yang lebih positif dan produktif, yang pada gilirannya dapat meningkatkan potensi dan kinerja mereka.


        </p>
    </div>
</div>
</div>
</div>
<!-- About End -->

@endsection

