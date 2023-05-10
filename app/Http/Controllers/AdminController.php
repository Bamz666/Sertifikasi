<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public $registrasi;
    // membuat instance dari model Registrasi
    public function __construct()
    {
        $this->registrasi = new Registrasi();
    }

    public function index(Request $request)
    {
        $jurusan = Jurusan::all();
        $agama = Agama::all();

        $cari = $request->search;

        $data = DB::table('registrasi')
            ->join('jurusan', 'jurusan.id_jurusan', '=', 'registrasi.id_jurusan')
            ->join('agama', 'agama.id_agama', '=', 'registrasi.id_agama')
            ->select('registrasi.*', 'jurusan.*', 'agama.*')
            ->where('registrasi.nama', 'LIKE', "%$cari%")
            ->orWhere('registrasi.asal_sekolah', 'LIKE', "%$cari%")
            ->get();

        return view('admin.admin', compact('data', 'jurusan', 'agama'));
    }

    public function exportPdf()
    {
        $data = Registrasi::all();
        $pdf = Pdf::loadView('pdf.export-book', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('export-book' . Carbon::now()->timestamp . '.pdf');
    }

    // create utk jurusan
    public function create()
    {
        $data = Jurusan::all();
        return view('admin.createjurusan', compact('data'));
    }

    // create utk registrasi
    public function createregistrasi()
    {
        $data = Agama::all();
        $jurusan = Jurusan::all();
        return view('admin.createregistrasi', compact('data', 'jurusan'));
    }

    // create utk agama
    public function createagama()
    {
        $data = Agama::all();
        return view('admin.createagama', compact('data'));
    }

    // store utk jurusan
    public function store(Request $request)
    {
        $rules = [
            'jurusan' => 'required|unique:jurusan,nama_jurusan|min:1|max:100',
        ];

        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute terlalu banyak / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain"
        ];

        $this->validate($request, $rules, $messages);

        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $request->jurusan;

        $jurusan->save();

        return redirect()->route('admin')->with('status', 'data jurusan berhasil ditambah');
    }

    // store utk registrasi
    public function storeregistrasi(Request $request)
    {
        $rules = [
            'nama' => 'required|min:1|max:100',
            'noreg' => 'required|min:14|max:15|unique:registrasi,noreg',
            'jenis_kelamin' => 'required|min:1|max:100',
            'agama' => 'required',
            'asal_sekolah' => 'required|min:3|max:100',
            'jurusan' => 'required',
            'alamat' => 'required|min:1|max:100',

        ];

        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute terlalu banyak / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain"
        ];

        $this->validate($request, $rules, $messages);

        $this->registrasi->nama = $request->nama;
        $this->registrasi->noreg = $request->noreg;
        $this->registrasi->jenis_kelamin = $request->jenis_kelamin;
        $this->registrasi->id_agama = $request->agama;
        $this->registrasi->asal_sekolah = $request->asal_sekolah;
        $this->registrasi->id_jurusan = $request->jurusan;
        $this->registrasi->alamat = $request->alamat;

        $this->registrasi->save();

        return redirect()->route('dashboard')->with('status', 'Selamat, Registrasi Berhasil');
    }

    // store utk agama
    public function storeagama(Request $request)
    {
        $rules = [
            'agama' => 'required|unique:agama,nama_agama|min:1|max:100',
        ];

        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute terlalu banyak / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain"
        ];

        $this->validate($request, $rules, $messages);

        $agama = new Agama();
        $agama->nama_agama = $request->agama;

        $agama->save();

        return redirect()->route('admin')->with('status', 'data agama berhasil ditambah');
    }

    // edit utk jurusan
    public function editjurusan($id)
    {
        $edit = Jurusan::findOrFail($id);
        return view('admin.editjurusan', compact('edit'));
    }

    // edit utk agama
    public function editagama($id)
    {
        $edit = Agama::findOrFail($id);
        return view('admin.editagama', compact('edit'));
    }

    // edit utk registrasi
    public function editregistrasi($id)
    {
        $edit = Registrasi::findOrFail($id);
        $jurusan = Jurusan::all();
        $agama = Agama::all();
        return view('admin.editregistrasi', compact('edit', 'jurusan', 'agama'));
    }

    //    update utk agama
    public function updateagama(Request $request, $id)
    {
        $update = Agama::findOrFail($id);
        $namaAgamaBaru = $request->agama;

        if ($namaAgamaBaru === $update->nama_agama) {
            $update->save();
            return redirect()->route('admin');
        } else {
            $existingAgama = Agama::where('nama_agama', $namaAgamaBaru)->first();
            if ($existingAgama) {
                return redirect()->route('admin')->with('error', 'Maaf, agama sudah tersedia, silakan input lain');
            } else {
                $update->nama_agama = $namaAgamaBaru;
                $update->save();
                return redirect()->route('admin')->with('status', 'Data agama berhasil diupdate');
            }
        }
    }

    //    update utk jurusan
    public function updatejurusan(Request $request, $id)
    {
        $update = Jurusan::findOrFail($id);
        $namaJurusanBaru = $request->jurusan;

        if ($namaJurusanBaru === $update->nama_jurusan) {
            $update->save();
            return redirect()->route('admin');
        } else {
            $existingJurusan = Jurusan::where('nama_jurusan', $namaJurusanBaru)->first();
            if ($existingJurusan) {
                return redirect()->route('admin')->with('error', 'Maaf, jurusan sudah tersedia, silakan input lain');
            } else {
                $update->nama_jurusan = $namaJurusanBaru;
                $update->save();
                return redirect()->route('admin')->with('status', 'Data jurusan berhasil diupdate');
            }
        }
    }

    //    update utk registrasi
    public function updateregistrasi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'noreg' => 'required',
            'alamat' => 'nullable|string',
            'asal_sekolah' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'agama' => 'nullable|string',
        ]);

        $user = Registrasi::findOrFail($id);
        $user->nama = $validatedData['nama'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->noreg = $validatedData['noreg'];
        $user->alamat = $validatedData['alamat'];
        $user->asal_sekolah = $validatedData['asal_sekolah'];
        $user->id_jurusan = $validatedData['jurusan'];
        $user->id_agama = $validatedData['agama'];

        if ($user->isDirty()) {
            $user->save();
            return redirect()->route('admin')->with('status', 'Data registrasi berhasil diupdate');
        } else {
            return redirect()->route('admin');
        }
    }

    //    destroy utk jurusan
    public function destroyjurusan($id)
    {
        $destroy = Jurusan::findOrFail($id);
        $destroy->delete();
        return redirect()->route('admin')->with('status', ' data jurusan berhasil dihapus');
    }

    //    destroy utk agama
    public function destroyagama($id)
    {
        $destroy = Agama::findOrFail($id);
        $destroy->delete();
        return redirect()->route('admin')->with('status', ' data agama berhasil dihapus');
    }

    //    destroy utk registrasi
    public function destroyregistrasi($id)
    {
        $destroy = Registrasi::findOrFail($id);
        $destroy->delete();
        return redirect()->route('admin')->with('status', ' data registrasi berhasil dihapus');
    }
}
