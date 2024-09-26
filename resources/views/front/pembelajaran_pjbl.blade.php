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
                <h1 class="display-3 text-white animated slideInDown">Pembelajaran PjBL</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Pembelajaran PjBL</li>

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
                <h6 class="section-title bg-white text-start text-primary pe-3">Pembelajaran PjBL</h6>
                <h1 class="mb-4">Apa itu Pembelajaran PjBL ?</h1>
                <p class="mb-4">Model Pembelajaran Berbasis Proyek (Project-based Learning/PjBL) adalah pendekatan pembelajaran yang didasarkan pada prinsip-prinsip konstruktivisme, yang menekankan pembelajaran sebagai proses aktif di mana Mahasiswa secara aktif terlibat dalam pembangunan pengetahuan melalui pengalaman nyata. Dalam PjBL, Mahasiswa terlibat dalam eksplorasi dan penyelidikan mendalam terhadap topik tertentu melalui proyek atau tugas yang memiliki relevansi langsung dengan dunia nyata. Pendekatan ini untuk mengembangkan pemahaman mendalam tentang konsep-konsep pelajaran, mengembangkan keterampilan berpikir kritis, memperluas keterampilan kolaborasi, serta menerapkan pengetahuan dalam situasi kontekstual. PjBL juga memberikan ruang bagi pengembangan autonomi mahasiswa, karena mereka memiliki kendali dalam merencanakan, melaksanakan, dan mengevaluasi proyek mereka sendiri. Melalui pembelajaran berkelanjutan dan refleksi, Mahasiswa juga dapat meningkatkan kemampuan mereka dalam memecahkan masalah kompleks, beradaptasi dengan konteks yang beragam, dan berkomunikasi dengan efektif. Dengan demikian, PjBL bukan hanya sekadar metode pembelajaran, tetapi juga pendekatan yang berpotensi menciptakan pengalaman pembelajaran yang bermakna dan relevan dalam mempersiapkan Mahasiswa untuk menghadapi tantangan dunia modern.
                    <br>
                    <br>
                    Melalui penerapan model pembelajaran Mahasiswa dipandu untuk menguasai informasi dan keterampilan yang disajikan dalam proses pembelajaran. Sajian proses pembelajaran selain terhadap konten isi pembelajaran juga terhadap tujuan yang mengarahkan kepada jangka panjang suatu program program.
                    Manfaat model pembelajaran sebagai berikut :
                    <ol>
                        <li> Mempelajari penguasaan konsep dan cara menemukannya</li>
                        <li> Membangun hipotesis, teori dan menggunakan alat-alat sains untuk pembuktian</li>
                        <li> Mengekstrak informasi dan ide dari perkuliahan</li>
                        <li> Mempelajari isu-isu social</li>
                        <li> Menganalisis nilai-nilai sosial.</li>
                        <li> Mendapatkan keuntungan dari pelatihan dan penerapnnya sepert keterampilan atletik, seni pertunjukan, matematika, dan social</li>
                        <li> Membuat tulisan dan pemecahan masalah lebih lebih jernih dan kreatif</li>
                        <li> Mengambil inisiatif dalam merencanakan pelajaran pribadi, pembelajaran dan penyelidikan yang kooperatif serta kemampuanbekerja dengan orang lain.</li>
                    </ol>

                    Pembahasan lebih lengkap terdapat dalam buku pdf ini: <a href="{{ asset('file/PjBL - Brainstorming.pdf') }}" target="_blank" class="btn btn-primary btn-sm">download</a>


</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection

