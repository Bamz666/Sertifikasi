@extends('template.main')
@section('konten')
<div class="page-inner">
 
    {{-- buat ngecek apakah variabel status ada nilainya atau gak --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card card-info card-annoucement card-round">
        <div class="card-body text-center">
            <div class="card-opening">Selamat Datang Brads!</div>
            <div class="card-desc">
                Selamat atas suksesnya kamu di masa SMP kemarin. Sekarang, yuk kejar impian kamu dengan bersekolah
                di salah satu sekolah favorit di Indonesia. Registrasi Di bawah yaa!!!
            </div>
            <div class="card-detail">
                <a href="{{ route('dashboard.createregistrasi')}}">
                <div class="btn btn-light btn-rounded">Registrasi</div>
                </a>
            </div>
        </div>
    </div>

    <center> <h4 class="page-title">Jurusan</h4></center>
    
<div class="row">
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://pijar.petik.or.id/pluginfile.php/2745/course/overviewfiles/Screenshot%20from%202022-12-29%2014-14-25.png" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar">
                        <img src="{{ asset('vendor') }}/examples/assets/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info-post ml-2">
                        <p class="username">Joko Sudoyono</p>
                        <p class="date text-muted">20 Jan 23</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <p class="card-category text-info mb-1"><a href="#">Programmer</a></p>
                <h3 class="card-title">
                    <a href="#">
                        Pemrograman Frontend
                    </a>
                </h3>
                <p class="card-text">Jurusan yang memberikan sebuah pelajaran akan serunya Pemrograman Frontend.</p>
                <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://pijar.petik.or.id/pluginfile.php/2741/course/overviewfiles/53ceda222f6fc146e3769e95b6c5eff7.png" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar">
                        <img src="{{ asset('vendor') }}/examples/assets/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info-post ml-2">
                        <p class="username">Joko Sudoyono</p>
                        <p class="date text-muted">22 Maret 23</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <p class="card-category text-info mb-1"><a href="#">Programmer</a></p>
                <h3 class="card-title">
                    <a href="#">
                        Antarmuka Aplikasi
                    </a>
                </h3>
                <p class="card-text">Jurusan ini bakalan bikin kamu jadi seorang UI/UX yang jago, dan pastinya bikin kamu
                    jadi dilirik sama orang-orang diluar sana.</p>
                <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://pijar.petik.or.id/pluginfile.php/2744/course/overviewfiles/back-end-word-concepts-banner-database-programming-web-applications-development-presentation-website-isolated-lettering-typography-idea-with-linear-icons-outline-illustration-vector.jpg" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex">
                    <div class="avatar">
                        <img src="{{ asset('vendor') }}/examples/assets/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info-post ml-2">
                        <p class="username">Joko Sudoyono</p>
                        <p class="date text-muted">10 Desember 22</p>
                    </div>
                </div>
                <div class="separator-solid"></div>
                <p class="card-category text-info mb-1"><a href="#">Programmer</a></p>
                <h3 class="card-title">
                    <a href="#">
                        Pemrograman Backend
                    </a>
                </h3>
                <p class="card-text">Ini nih jurusan yang terkenal akan tingkat kesulitannya yang menguji iman. Tapi tenang aja,
                    guru pengajarnya asik kok.</p>
                <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
            </div>
        </div>
    </div>
</div>
<center class="mt-3"> <h4 class="page-title">Sekolah Kami</h4></center>
<div class="row">
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://t-2.tstatic.net/medan/foto/bank/images/British-School-Jakarta-Banten.jpg" alt="Card image cap">
            <div class="card-body">
               
                <p class="card-category text-info mb-1"><a href="#">Outdoor</a></p>
                <h3 class="card-title">
                    <a href="#">
                        Tempat Olahraga
                    </a>
                </h3>
                <p class="card-text">Tempat olahraga yang terjaga bisa bikin kesehatan kamu terjaga juga loh, karena 
                    bisa bikin kamu pengen olahraga terus.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://asset.kompas.com/crops/iMD_W83lNL4s-6DdoUqfrFmUXDI=/0x0:934x623/750x500/data/photo/2020/06/20/5eede16f9b02b.jpg" alt="Card image cap">
            <div class="card-body">
               
                <p class="card-category text-info mb-1"><a href="#">Indoor</a></p>
                <h3 class="card-title">
                    <a href="#">
                        Ruang Belajar
                    </a>
                </h3>
                <p class="card-text">Dengan ruang belajar yang nyaman dijamin bisa bikin kamu cepet nangkep pelajaran yang
                    diajarkan oleh guru.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-post card-round">
            <img class="card-img-top" src="https://jadiberita.com/wp-content/uploads/2016/03/horikoshi-2.jpg" alt="Card image cap">
            <div class="card-body">
               
                <p class="card-category text-info mb-1"><a href="#">Outdoor</a></p>
                <h3 class="card-title">
                    <a href="#">
                       Gedung Sekolah
                    </a>
                </h3>
                <p class="card-text">Tampilan sekolah yang terlihat kokoh, menggambarkan siswa/i nya yang tak mudah runtuh semangatnya.</p>
            </div>
        </div>
    </div>
</div>

<center class="mt-3"> <h4 class="page-title">List Harga</h4></center>

<div class="row justify-content-center align-items-center mb-5">
    <div class="col-md-3 pl-md-0">
        <div class="card-pricing2 card-success">
            <div class="pricing-header">
                <h3 class="fw-bold">Standard</h3>
                <span class="sub-title">Low Class</span>
            </div>
            <div class="price-value">
                <div class="value">
                    <span class="currency">$</span>
                    <span class="amount">10.<span>99</span></span>
                    <span class="month">/month</span>
                </div>
            </div>
            <ul class="pricing-content">
                <li>50GB Disk Space</li>
                <li>50 Email Accounts</li>
                <li>50GB Monthly Bandwidth</li>
                <li class="disable">10 Subdomains</li>
                <li class="disable">15 Domains</li>
            </ul>
            <a href="{{ route('dashboard.createregistrasi')}}" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Register</a>
        </div>
    </div>
    <div class="col-md-3 pl-md-0 pr-md-0">
        <div class="card-pricing2 card-primary">
            <div class="pricing-header">
                <h3 class="fw-bold">Business</h3>
                <span class="sub-title">Medium Class</span>
            </div>
            <div class="price-value">
                <div class="value">
                    <span class="currency">$</span>
                    <span class="amount">20.<span>99</span></span>
                    <span class="month">/month</span>
                </div>
            </div>
            <ul class="pricing-content">
                <li>60GB Disk Space</li>
                <li>60 Email Accounts</li>
                <li>60GB Monthly Bandwidth</li>
                <li>15 Subdomains</li>
                <li class="disable">20 Domains</li>
            </ul>
            <a href="{{ route('dashboard.createregistrasi')}}" class="btn btn-primary btn-border btn-lg w-75 fw-bold mb-3">Register</a>
        </div>
    </div>
    <div class="col-md-3 pr-md-0">
        <div class="card-pricing2 card-secondary">
            <div class="pricing-header">
                <h3 class="fw-bold">Premium</h3>
                <span class="sub-title">High Class</span>
            </div>
            <div class="price-value">
                <div class="value">
                    <span class="currency">$</span>
                    <span class="amount">30.<span>99</span></span>
                    <span class="month">/month</span>
                </div>
            </div>
            <ul class="pricing-content">
                <li>70GB Disk Space</li>
                <li>70 Email Accounts</li>
                <li>70GB Monthly Bandwidth</li>
                <li>20 Subdomains</li>
                <li>25 Domains</li>
            </ul>
            <a href="{{ route('dashboard.createregistrasi')}}" class="btn btn-secondary btn-border btn-lg w-75 fw-bold mb-3">Register</a>
        </div>
    </div>
</div>
</div>
@endsection