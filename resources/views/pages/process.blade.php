@extends('main')
@section('content')
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url( {{ asset('/images/img_bg_2.jpg') }});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Proses Taaruf</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-portfolio">
		<div class="container">
			<div class="row">
				<div class="project">
					<div class="col-md-8 col-md-push-6 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/cv.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Mengisi Formulir Curriculume Vitae (CV)</h3>
							<p class="text-justify">Diperuntukkan untuk mengetahui sekilas dari diri sendiri yang nantinya akan diolah oleh tim qtaaruf untuk menemukan calon pasangan kalian. Adapun syarat dan ketentuan sebelum mengisi Curriculume Vitae</p>
							<ul class="list-nav">
								<li><i class="icon-check"></i>Telah mendapatkan izin dari orang tua</li>
								<li><i class="icon-check"></i>Foto/scan/identitas (KTP/SIM/Passport)</li>
								<li><i class="icon-check"></i>Siap khitbah dalam waktu 3 bulan</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="project">
					<div class="col-md-8 col-md-push-2 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/tukar_biodata.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-2 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Tukar biodata</h3>
							<p class="text-justify">Bertukar biodata Curriculume Vitae (CV) yang akan dimediasi ustad qtaaruf</p>
							<!-- <div>
								<h4><i class="icon-user"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-video2"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-shield"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div> -->
						</div>
					</div>
				</div>
				<div class="project">
					<div class="col-md-8 col-md-push-6 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/mediasi_online.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Mediasi Online</h3>
							<p class="text-justify">Memasuki proses mediasi online melalui video call yang dapat dimediasi oleh pihak qtaaruf atau mediator dari perempuan</p>
							{{-- <ul class="list-nav">
								<li><i class="icon-check"></i>Grup WhatsApp</li>
								<li><i class="icon-check"></i>Grup Telegram</li>
								<li><i class="icon-check"></i>Grup Line</li>
								<li><i class="icon-check"></i>Video Call Google Hangout</li>
								<li><i class="icon-check"></i>Video Call Skype</li>
							</ul> --}}
						</div>
					</div>
				</div>
				<div class="project">
					<div class="col-md-8 col-md-push-2 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/nadzor.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-2 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Nadzor</h3>
							<p class="text-justify">Bertemunya kedua belah pihak keluarga dari masing-masing tiap pasangan untuk memastikan apakah hubungan kedua anaknya dapat ke jenjang selanjutnya atau tidak.</p>
							<!-- <div>
								<h4><i class="icon-user"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-video2"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-shield"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div> -->
						</div>
					</div>
				</div>
				<div class="project">
					<div class="col-md-8 col-md-push-6 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/khitbah.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-6 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Khitbah</h3>
							<p class="text-justify">Khitbah dapat terlaksana apabila pada tahap nadzor telah tercapai kata sepakat dari kedua belah pihak. Pada tahap khitbah, pihak laki-laki akan melamar pihak perempuan, yang dimana kelak kedua pasangan dapat ke jenjang selanjutnya.</p>
							<!-- <ul class="list-nav">
								<li><i class="icon-check"></i>Far far away, behind the word</li>
								<li><i class="icon-check"></i>There live the blind texts</li>
								<li><i class="icon-check"></i>Separated they live in bookmarksgrove</li>
								<li><i class="icon-check"></i>Semantics a large language ocean</li>
								<li><i class="icon-check"></i>A small river named Duden</li>
							</ul> -->
						</div>
					</div>
				</div>
				<div class="project">
					<div class="col-md-8 col-md-push-2 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="{{ asset('/images/proses/menikah.png') }}" alt="work" style="width: 45%; height: 45%">
					</div>
					<div class="col-md-4 col-md-pull-2 animate-box" data-animate-effect="fadeInRight">
						<div class="mt">
							<h3 class="text-center">Menikah</h3>
							<p class="text-justify">Setelah terjadinya proses khitbah, proses terakhir dalam ta'aruf adalah pernikahan. Disinilah moment disaat sang mempelai laki-laki menjabat tangan wali mempelai perempuan dan mengucapkan ijab khobul. Hingga keduanya resmi menjadi sepasang suami istri.</p>
							<!-- <div>
								<h4><i class="icon-user"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-video2"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-shield"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection