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
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Data Registrasi</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Registrasi</div>
                </div>
                <form action="{{ route('dashboard.storeregistrasi') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nama Siswa</label>
                                            <input type="text" value="{{ old('nama')}}" name="nama" class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" id="jd" placeholder="Masukkan nama siswa">
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
                                            <input type="text" value="{{ old('noreg')}}" name="noreg" class="form-control {{ $errors->first('noreg') ? "is-invalid":""}}" id="jd" placeholder="Masukkan noReg">
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
                                            <select name="jenis_kelamin" id="" class="form-control {{ $errors->first('jenis_kelamin') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Jenis Kelamin ==-</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
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
                                            <label for="jd">Agama</label>
                                            <select name="agama" id="" class="form-control {{ $errors->first('agama') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Agama ==-</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id_agama}}">
                                                    {{ $item->nama_agama}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('agama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Asal Sekolah</label>
                                            <input type="text" value="{{ old('asal_sekolah')}}" name="asal_sekolah" class="form-control {{ $errors->first('asal_sekolah') ? "is-invalid":""}}" id="jd" placeholder="Masukkan asal sekolah">
                                            @error('asal_sekolah')
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
                                                <option hidden>-== Pilih Jurusan ==-</option>
                                                @foreach ($jurusan as $item)
                                                    <option value="{{ $item->id_jurusan}}">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">Alamat</label>
                                            <input type="text" value="{{ old('alamat')}}" name="alamat" class="form-control {{ $errors->first('alamat') ? "is-invalid":""}}" id="jd" placeholder="Masukkan alamat">
                                            @error('alamat')
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection