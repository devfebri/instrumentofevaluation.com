@extends('front.master')
@section('contentfront')


<!-- Carousel Start -->
 <div class="container-fluid p-0 mb-5">
     <div class="owl-carousel header-carousel position-relative">
         <div class="owl-carousel-item position-relative">
             <img class="img-fluid" src="{{ asset('img/bg1.jpg') }}" alt="">
             <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                 <div class="container">
                     <div class="row justify-content-start">
                         <div class="col-sm-10 col-lg-8">
                             <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Midset</h5>
                             <h1 class="display-3 text-white animated slideInDown">Pola Pikir Berkembang</h1>
                             <p class="fs-5 text-white mb-4 pb-2">Pola Pikir Berkembang (growth mindset) adalah keyakinan bahwa kemampuan dan kecerdasan seseorang dapat berkembang melalui usaha, belajar, dan pengalaman.</p>
                             <a href="#" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                             <a href="{{ route('register') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Daftar Sekarang</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="owl-carousel-item position-relative">
             <img class="img-fluid" src="{{ asset('img/bg2.jpg') }}" alt="">
             <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                 <div class="container">
                     <div class="row justify-content-start">
                         <div class="col-sm-10 col-lg-8">
                             <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Mindset</h5>
                             <h1 class="display-3 text-white animated slideInDown">Pola Pikir tetap</h1>
                             <p class="fs-5 text-white mb-4 pb-2">Pola Pikir Tetap (fixed mindset) adalah keyakinan bahwa kemampuan, kecerdasan, dan bakat seseorang bersifat tetap dan tidak dapat diubah</p>
                             <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                             <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Carousel End -->


 <!-- Service Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="row g-4">
             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ route('perkembangan_otak') }}" target="_blank">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Perkembangan Otak</h5>
                        </div>
                    </div>
                 </a>
             </div>
             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                 <a href="{{ route('pola_pikir_berkembang') }}" target="_blank">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Pola Pikir Berkembang </h5>
                        </div>
                    </div>
                 </a>
             </div>
             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a href="{{ route('pola_pikir_tetap') }}" target="_blank">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Pola Pikir Tetap </h5>
                        </div>
                    </div>
                </a>
             </div>
             <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a href="{{ route('front_mindset') }}" target="_blank">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Mindset</h5>
                        </div>
                    </div>
                 </a>
             </div>
         </div>
     </div>
 </div>
 <!-- Service End -->


 <!-- About Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="row g-5">
             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                 <div class="position-relative h-100">
                     <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('img/bg3.jpg') }}" alt="" style="object-fit: cover;">
                 </div>
             </div>
             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                 <h6 class="section-title bg-white text-start text-primary pe-3 justify-center">Mindset </h6>
                 {{-- <h1 class="mb-4">Mindset</h1> --}}
                 <p class="mb-4 " style="text-align: justify;">Mindset adalah sekumpulan keyakinan, sikap, dan pola pikir yang membentuk cara seseorang memandang dirinya sendiri, orang lain, dan dunia di sekitarnya. Ini memengaruhi cara individu merespons
                    tantangan, belajar dari pengalaman, dan mengambil keputusan. Mindset dapat dibagi menjadi dua kategori utama: pola pikir tetap (fixed mindset), yang percaya bahwa kemampuan dan kecerdasan adalah sifat yang
                    tidak dapat diubah, dan pola pikir berkembang (growth mindset), yang meyakini bahwa kemampuan dapat ditingkatkan melalui usaha, pembelajaran, dan pengalaman. Dengan memahami dan mengubah mindset, individu dapat
                     meningkatkan potensi diri dan mencapai tujuan yang lebih besar.</p>


                 <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
             </div>
         </div>
     </div>
 </div>
 <!-- About End -->


 {{-- <!-- Categories Start -->
 <div class="container-xxl py-5 category">
     <div class="container">
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
             <h1 class="mb-5">Courses Categories</h1>
         </div>
         <div class="row g-3">
             <div class="col-lg-7 col-md-6">
                 <div class="row g-3">
                     <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                         <a class="position-relative d-block overflow-hidden" href="">
                             <img class="img-fluid" src="{{ asset('master/img/cat-1.jpg') }}" alt="">
                             <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                 <h5 class="m-0">Web Design</h5>
                                 <small class="text-primary">49 Courses</small>
                             </div>
                         </a>
                     </div>
                     <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                         <a class="position-relative d-block overflow-hidden" href="">
                             <img class="img-fluid" src="{{ asset('master/img/cat-2.jpg') }}" alt="">
                             <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                 <h5 class="m-0">Graphic Design</h5>
                                 <small class="text-primary">49 Courses</small>
                             </div>
                         </a>
                     </div>
                     <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                         <a class="position-relative d-block overflow-hidden" href="">
                             <img class="img-fluid" src="{{ asset('master/img/cat-3.jpg') }}" alt="">
                             <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                 <h5 class="m-0">Video Editing</h5>
                                 <small class="text-primary">49 Courses</small>
                             </div>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                 <a class="position-relative d-block h-100 overflow-hidden" href="">
                     <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('master/img/cat-4.jpg') }}" alt="" style="object-fit: cover;">

                     <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                         <h5 class="m-0">Online Marketing</h5>
                         <small class="text-primary">49 Courses</small>
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </div>
 <!-- Categories Start -->


 <!-- Courses Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
             <h1 class="mb-5">Popular Courses</h1>
         </div>
         <div class="row g-4 justify-content-center">
             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                 <div class="course-item bg-light">
                     <div class="position-relative overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/course-1.jpg') }}" alt="">
                         <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                         </div>
                     </div>
                     <div class="text-center p-4 pb-0">
                         <h3 class="mb-0">$149.00</h3>
                         <div class="mb-3">
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small>(123)</small>
                         </div>
                         <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                     </div>
                     <div class="d-flex border-top">
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                         <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                 <div class="course-item bg-light">
                     <div class="position-relative overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/course-2.jpg') }}" alt="">
                         <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                         </div>
                     </div>
                     <div class="text-center p-4 pb-0">
                         <h3 class="mb-0">$149.00</h3>
                         <div class="mb-3">
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small>(123)</small>
                         </div>
                         <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                     </div>
                     <div class="d-flex border-top">
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                         <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                 <div class="course-item bg-light">
                     <div class="position-relative overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/course-3.jpg') }}" alt="">
                         <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                             <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                         </div>
                     </div>
                     <div class="text-center p-4 pb-0">
                         <h3 class="mb-0">$149.00</h3>
                         <div class="mb-3">
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small class="fa fa-star text-primary"></small>
                             <small>(123)</small>
                         </div>
                         <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                     </div>
                     <div class="d-flex border-top">
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                         <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                         <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Courses End -->


 <!-- Team Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
             <h1 class="mb-5">Expert Instructors</h1>
         </div>
         <div class="row g-4">
             <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                 <div class="team-item bg-light">
                     <div class="overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/team-1.jpg') }}" alt="">
                     </div>
                     <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                         <div class="bg-light d-flex justify-content-center pt-2 px-1">
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                         </div>
                     </div>
                     <div class="text-center p-4">
                         <h5 class="mb-0">Instructor Name</h5>
                         <small>Designation</small>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                 <div class="team-item bg-light">
                     <div class="overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/team-2.jpg') }}" alt="">
                     </div>
                     <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                         <div class="bg-light d-flex justify-content-center pt-2 px-1">
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                         </div>
                     </div>
                     <div class="text-center p-4">
                         <h5 class="mb-0">Instructor Name</h5>
                         <small>Designation</small>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                 <div class="team-item bg-light">
                     <div class="overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/team-3.jpg') }}" alt="">
                     </div>
                     <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                         <div class="bg-light d-flex justify-content-center pt-2 px-1">
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                         </div>
                     </div>
                     <div class="text-center p-4">
                         <h5 class="mb-0">Instructor Name</h5>
                         <small>Designation</small>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                 <div class="team-item bg-light">
                     <div class="overflow-hidden">
                         <img class="img-fluid" src="{{ asset('master/img/team-4.jpg') }}" alt="">
                     </div>
                     <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                         <div class="bg-light d-flex justify-content-center pt-2 px-1">
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                             <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                         </div>
                     </div>
                     <div class="text-center p-4">
                         <h5 class="mb-0">Instructor Name</h5>
                         <small>Designation</small>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Team End -->


 <!-- Testimonial Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
     <div class="container">
         <div class="text-center">
             <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
             <h1 class="mb-5">Our Students Say!</h1>
         </div>
         <div class="owl-carousel testimonial-carousel position-relative">
             <div class="testimonial-item text-center">
                 <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('master/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;">
                 <h5 class="mb-0">Client Name</h5>
                 <p>Profession</p>
                 <div class="testimonial-text bg-light text-center p-4">
                     <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                 </div>
             </div>
             <div class="testimonial-item text-center">
                 <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('master/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;">
                 <h5 class="mb-0">Client Name</h5>
                 <p>Profession</p>
                 <div class="testimonial-text bg-light text-center p-4">
                     <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                 </div>
             </div>
             <div class="testimonial-item text-center">
                 <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('master/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;">
                 <h5 class="mb-0">Client Name</h5>
                 <p>Profession</p>
                 <div class="testimonial-text bg-light text-center p-4">
                     <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                 </div>
             </div>
             <div class="testimonial-item text-center">
                 <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('master/img/testimonial-4.jpg') }}" style="width: 80px; height: 80px;">
                 <h5 class="mb-0">Client Name</h5>
                 <p>Profession</p>
                 <div class="testimonial-text bg-light text-center p-4">
                     <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}
 <!-- Testimonial End -->

 @endsection
