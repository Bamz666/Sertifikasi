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
                <a href="{{ route('admin')}}">Data Agama</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Data Agama</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data  Agama: {{ $edit['nama_agama']}}</div>
                </div>
                <form action="{{ route('admin.updateagama', $edit['id_agama']) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">Nama Agama</label>
                                            <input type="text" value="{{ $edit['nama_agama']}}" name="agama" class="form-control" id="jd" placeholder="Masukkan agama">                                           
                                            @error('agama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                        <button type="submit" class="btn btn-secondary"><i class="icon-refresh"></i> Update</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection