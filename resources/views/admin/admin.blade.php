@extends('template.main')
@section('konten')
<div class="page-inner">
    <div class="page-header">
 
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Master Data</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Registrasi</a>
            </li>
        </ul>
        <div class="col-md-10">
            <form action="{{ route('admin')}}" method="get" class="float-right">
                <input style="width: 70%" type="text" name="search" id="" class="form-control d-inline" placeholder="Cari data...">
                <button type="submit" class="btn btn-secondary d-inline mb-1">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
 
    {{-- buat ngecek apakah variabel status ada nilainya atau gak --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
 
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Data Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Data Agama</a>
                    </li>
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h4 class="page-title float-left">Data Registrasi</h4>
                                            </div>    
                                            <a href="/export-pdf">
                                                <button class="btn btn-md btn-primary btn-round pl-4" style="float: right" >
                                                <i class="fas fa-plus-circle"></i>Eksport PDF
                                                </button>
                                             </a>
                                        </div>            
                                    </div>                                   
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <th style="width:7%">NoReg</th>
                                                    <th style="width:13%">Nama</th>
                                                    <th style="width:10%">JK</th>
                                                    <th style="width:15%">Alamat</th>
                                                    <th style="width:8%">Agama</th>
                                                    <th style="width:14%">Asal Sekolah</th>
                                                    <th style="width:10%">Jurusan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->noreg }}</td>
                                                    <td>{{ $item->nama}}</td>
                                                    <td>{{ $item->jenis_kelamin}}</td>
                                                    <td>{{ $item->alamat}}</td>
                                                    <td>{{ $item->nama_agama}}</td>
                                                    <td>{{ $item->asal_sekolah}}</td>
                                                    <td>{{ $item->nama_jurusan}}</td>
                                                    <td>
                                                    <a href="{{ route('admin.editregistrasi',$item->id_registrasi)}}" style="text-decoration: none">
                                                        <button type="button" class="btn btn-icon btn-round btn-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </button> &nbsp;
                                                    </a>
                                                    <a href="{{ route('admin.destroyregistrasi',$item->id_registrasi)}}">
                                                        <button onclick="return confirm('Yakin data dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h4 class="page-title float-left">Data Jurusan</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('admin.createjurusan')}}">
                                                    <button class="btn btn-md btn-primary btn-round">
                                                    <i class="fas fa-plus-circle"></i> Tambah
                                                    </button>
                                                </a>
                                            </div>      
                                        </div>            
                                    </div>                                   
                                    <div class="card-body">
                                        <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <th style="width:15%">No</th>
                                                    <th style="width:68%">Nama Jurusan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no=1;
                                                @endphp
                                                @foreach ($jurusan as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $item->nama_jurusan}}</td>
                                                    <td>
                                                    <a href="{{ route('admin.editjurusan',$item->id_jurusan)}}" style="text-decoration: none">
                                                        <button type="button" class="btn btn-icon btn-round btn-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </button> &nbsp;
                                                    </a>
                                                    <a href="{{ route('admin.destroyjurusan',$item->id_jurusan)}}">
                                                        <button onclick="return confirm('Yakin data dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>     
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="page-title float-left">Data Agama</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('admin.createagama')}}">
                                            <button class="btn btn-md btn-primary btn-round">
                                            <i class="fas fa-plus-circle"></i> Tambah
                                            </button>
                                        </a>
                                    </div>      
                                </div>            
                            </div>                                   
                            <div class="card-body">
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th style="width:15%">No</th>
                                            <th style="width:68%">Nama Agama</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($agama as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->nama_agama}}</td>
                                            <td>
                                            <a href="{{ route('admin.editagama',$item->id_agama)}}" style="text-decoration: none">
                                                <button type="button" class="btn btn-icon btn-round btn-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </button> &nbsp;
                                            </a>
                                            <a href="{{ route('admin.destroyagama',$item->id_agama)}}">
                                                <button onclick="return confirm('Yakin data dihapus?')" type="button" class="btn btn-icon btn-round btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
                <p>* Olah data dengan teliti supaya tidak terjadi kesalahan dalam pengolahan data</p>
            </div>
        </div>
    </div> 
</div>
@endsection