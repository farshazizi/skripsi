@extends('main')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْمِ</h1>
                            <h2>Demi Allah Yang Maha Mengetahui, saya menyatakan bahwa saya sudah siap untuk menikah dan berikhtiar taaruf secara syar'i.</h2>
                            <div class="register-wrap">
                                <!-- <form action="input.php" method="post" class="form-horizontal form">
                                    <div class="row" style="margin-bottom:2%">
                                    <input type="text" class="form-hero" name="panggilan" placeholder="Nama Panggilan" required>
                                    <input type="email" class="form-hero" name="email" placeholder="Email" required>
                                    <select class="form-hero" name="gender" required style="height:150%">
                                        <option value="" hidden="true">Jenis Kelamin</option>
                                        <option value="laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Ta`aruf sekarang</button>
                                </form> -->
                                    <!-- <button type="submit" class="btn btn-default"><a href="/registration1/create">Ta`aruf sekarang</a>Ta`aruf sekarang</button> -->
                                <a href="/login" class="btn btn-default">Taaruf Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center fh5co-heading-2">
                    <h2>Kenapa memilih kami?</h2>
                    <p></p>
                </div>
                <div class="col-third">
                    <div class="col-md-12 col-sm-12">
                        <span class="icon">
                            <img src="{{ asset('/images/e.png') }}" style="width: 75%; height: 75%"/>
                        </span>
                        <div class="desc fh5co-heading">
                            <h3><b>Secure</b></h3>
                            <p class="text-justify">Seluruh informasi data pribadi kamu dijamin keamanannya oleh qtaaruf. Hanya kamu, calon pasangan dan mediator yang tahu</p>
                        </div>
                    </div>
                </div>
                <div class="col-third">
                    <div class="col-md-12 col-sm-12">
                        <span class="icon">
                            <img src="{{ asset('/images/jam_pasir.jpg') }}" style="width: 65%; height: 65%"/>
                        </span>
                        <div class="desc fh5co-heading">
                            <h3><b>Real Time</b></h3>
                            <p class="text-justify">Bersama kami, kamu dapat menjalankan proses taaruf lebih efisien meskipun ditengah kesibukkanmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-third">
                    <div class="col-md-12 col-sm-12">
                        <span class="icon">
                            <img src="{{ asset('/images/q.png') }}" style="width: 100%; height: 100%"/>
                        </span>
                        <div class="desc fh5co-heading">
                            <h3><b>Syar'i</b></h3>
                            <p class="text-justify">qtaaruf membantu kamu dan calon pasanganmu menjalani proses taaruf sesuai dengan ajaran agama islam</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-10 col-md-offset-1 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <p><a href="about.html" class="btn btn-default" id="btn_proses">Learn More</a></p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
            
    <!-- <div class="fh5co-bg-section">
        <div id="depan">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading-3">
                    <h2>Collaborators</h2>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img src="assets/images/partners/fitrah2.jpg">
                        <h3>Fitrah Subarkah</h3>
                        <strong class="role">Mediator qtaaruf</strong>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                      <img src="assets/images/partners/yosi_round.jpg">
                        <h3>Ust. Yosi Al Muzanni</h3>
                        <strong class="role">Love Coach Sekolah Cinta</strong>
                    </div>
               </div>
                <div class="col-md-6 col-sm-6 animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img src="assets/images/partners/dina1.jpg">
                        <h3>Dina Wahida, M.Psi</h3>
                        <strong class="role">Psikolog</strong>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div id="fh5co-testimonial" style="background-image: url( {{ asset('/images/foto_bawah.jpg') }});">
        <div class="container">         
            <div class="animate-box">
                <div class="testimony">
                    <blockquote>
                        <h5><b>Jika Jodoh adalah bagian dari rizqi</b></h5>
                        <p style="color: #fff" class="text-justify">&ldquo;Janganlah kalian merasa bahwa rizqi kalian datangnya terlambat, karena sesungguhnya tidaklah seseorang hamba meninggal, hingga telah datang kepadanya rizqi terakhir yang di tetapkan untuknya. Maka tempuhlah jalan yang baik dalam mencari rizqi, yaitu dengan yang halal dan meninggalkan yang haram.&rdquo;</p>
                    </blockquote>
                    <p class="author"><cite><b></b>Sabda Rasulullah, diriwayatkan Imam Ibnu Majah</cite></p>
                </div>
            </div>
        </div>
    </div>
@endsection