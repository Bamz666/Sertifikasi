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
                <a href="{{ route('admin')}}">Data Registrasi</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Data Registrasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Registrasi: {{ $edit['nama']}}</div>
                </div>
                <form action="{{ route('admin.updateregistrasi', $edit['id_registrasi']) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nama Siswa</label>
                                            <input type="text" value="{{ $edit['nama']}}" name="nama" class="form-control" id="jd" placeholder="Masukkan nama siswa">                                           
                                            @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">NoReg</label>
                                            <input type="text" value="{{ $edit['noreg']}}" name="noreg" class="form-control" id="jd" placeholder="Masukkan noReg">                                           
                                            @error('noreg')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                                <option value="L" <?= ($edit['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                                <option value="P" <?= ($edit['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>               
                                            </select>
                                            @error('jenis_kelamin')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Jurusan</label>
                                            <select name="jurusan" id="" class="form-control {{ $errors->first('jurusan') ? "is-invalid":""}}">
                                                @foreach ($jurusan as $item)
                                                    <option @if ($item->id_jurusan == $edit['id_jurusan'])
                                                    {{ "selected" }}
                                                    @endif value="{{ $item->id_jurusan}}">
                                                    {{ $item->nama_jurusan}}
                                                    </option>
                                                @endforeach
                                            </select>                                         
                                            @error('jurusan')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Alamat</label>
                                            <input type="text" value="{{ $edit['alamat']}}" name="alamat" class="form-control" id="jd" placeholder="Masukkan alamat">                                           
                                            @error('alamat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
                                        </div>
                                    </div>                 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Agama</label>
                                            <select name="agama" id="" class="form-control {{ $errors->first('agama') ? "is-invalid":""}}">
                                                @foreach ($agama as $item)
                                                    <option @if ($item->id_agama == $edit['id_agama'])
                                                    {{ "selected" }}
                                                    @endif value="{{ $item->id_agama}}">
                                                    {{ $item->nama_agama}}
                                                    </option>
                                                @endforeach
                                            </select>                                         
                                            @error('jurusan')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">Asal Sekolah</label>
                                            <input type="text" value="{{ $edit['asal_sekolah']}}" name="asal_sekolah" class="form-control" id="jd" placeholder="Masukkan asal_sekolah">                                           
                                            @error('asal_sekolah')
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