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
                <h1 class="display-3 text-white animated slideInDown">Brainstorming</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Brainstorming</li>


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
            {{-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('master/img/cat-4.jpg') }}" alt="" style="object-fit: cover;">

                </div>
            </div> --}}
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                {{-- <h6 class="section-title bg-white text-start text-primary pe-3">Dampak</h6> --}}
                <h1 class="mb-4">Brainstorming</h1>

                <p class="mb-4">
                    Brainstorming adalah suatu teknik atau proses kelompok yang digunakan untuk menghasilkan ide-ide kreatif dan solusi untuk suatu masalah atau proyek. Pola pikir brainstorming mencakup sejumlah prinsip dan aturan yang dapat meningkatkan efektivitasnya.
                    <ol>
                        <li>Defer Judgment (Menunda Penilaian):</li>
                        Pola pikir ini mengacu pada penundaan penilaian atau kritik terhadap ide-ide yang diajukan selama sesi brainstorming. Tujuannya adalah menciptakan lingkungan yang mendukung pengungkapan ide tanpa takut dihakimi. Hal ini memungkinkan setiap anggota kelompok untuk merasa bebas berekspresi.
                        <li>Quantity breeds Quality (Kuantitas Menghasilkan Kualitas):</li>
                        Pola pikir ini menekankan pada produksi sebanyak mungkin ide dalam sesi brainstorming. Semakin banyak ide yang dihasilkan, semakin besar kemungkinan untuk menemukan solusi yang kreatif. Fokus pada kuantitas awal, dan kemudian filter dan evaluasi ide-ide tersebut.
                        <li>Build on the Ideas of Others (Membangun Atas Ide Orang Lain):</li>
                        Dalam pola pikir ini, setiap anggota kelompok diharapkan untuk membangun atau mengembangkan ide-ide yang telah diajukan oleh orang lain. Hal ini menggalang kolaborasi dan meningkatkan variasi ide-ide yang dihasilkan.
                        <li>Encourage Wild and Unusual Ideas (Mendorong Ide-Ide Gila dan Tidak Biasa):</li>
                        Suatu sesi brainstorming efektif tidak hanya membatasi diri pada ide-ide yang konvensional atau masuk akal. Mendorong ide-ide yang "gila" atau tidak konvensional dapat memunculkan solusi-solusi yang inovatif.
                        <li>Stay Focused on the Topic (Tetap Fokus pada Topik):</li>
                        Penting untuk memastikan bahwa ide-ide yang dihasilkan tetap terkait dengan topik atau masalah yang sedang dibahas. Ini membantu menjaga relevansi dan memastikan bahwa brainstorming memiliki hasil yang bermanfaat.




                    </ol>
                    Melalui penerapan pola pikir ini, proses brainstorming dapat menjadi sarana yang efektif untuk menghasilkan ide-ide kreatif dan solusi yang dapat digunakan dalam berbagai konteks, baik di dunia bisnis, pendidikan, atau pengembangan proyek.
                    <br>
                    <br>
                    Untuk panduan Brainstorming terdapat dalam file pdf ini: <a href="{{ asset('file/BUKU_PANDUAN_BRAINSTORMING.pdf') }}" class="btn btn-primary btn-sm" target="_blank">download</a>
                </p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection

