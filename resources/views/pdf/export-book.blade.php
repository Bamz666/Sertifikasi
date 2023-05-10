<div class="card-body">
    <table class="table mt-3">
        <thead>
            <tr>
                <th style="width:2%">NoReg</th>
                <th style="width:20%">Nama</th>
                <th style="width:1%">JK</th>
                <th style="width:23%">Alamat</th>
                <th style="width:1%">Agama</th>
                <th style="width:25%">Asal Sekolah</th>
                <th style="width:5%">Jurusan</th>
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
                <td>{{ $item->agama->nama_agama}}</td>
                <td>{{ $item->asal_sekolah}}</td>
                <td>{{ $item->jurusan->nama_jurusan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>