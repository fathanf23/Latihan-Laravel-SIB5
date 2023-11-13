<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Jenis_produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Produk berelasi dengan jenis produk
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->get();
        return view ('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        return view('admin.produk.create', compact('jenis_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'kode' => 'required |unique:produk|max:10',            
            'nama' => 'required |max:45',            
            'harga_beli' => 'required |numeric',            
            'harga_jual' => 'required |numeric', 
            'stok' => 'required |integer',
            'min_stok' => 'required |integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deskripsi' => 'nullable|string|min:10',
            'jenis_produk_id' => 'required |integer',           
        ],
        [
            'kode.max' => 'Kode Maksimal 10 karakter',
            'kode.required' => 'Kode Wajib Di Isi!',
            'kode.unique' => 'Kode Sudah Terisi Pada Data Lain',
            'nama.required' => 'Nama Wajib Di Isi!',
            'nama.max' => 'Nama Maksimal 45 Karekter',
            'harga_beli.required' => 'Harga Beli Harus Di Isi!',
            'harga_beli.numeric' => 'Harus Angka!',
            'harga_jual.required' => 'Harga Jual Harus Di Isi!',
            'harga_jual.numeric' => 'Harus Angka!',
            'stok.required' => 'Stok Harus Di Isi',
            'min_stok.required' => 'Minimal Stok Harus Di Isi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File Ekstensi Harus JPG, JPEG, GIF, PNG, SVG',
        ]
    );
        // proses upload foto
        if(!empty($request->foto)){
            $filename = 'foto-'.uniqid().'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/img'),$filename);
        }else{
            $filename = '';
        }
        //tambah data menggunakan query builder
        DB::table('produk')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'foto'=>$filename,
            'deskripsi'=>$request->deskripsi,
            'jenis_produk_id'=>$request->jenis_produk_id,
        ]);
        return redirect('admin/produk');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        {
            $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->where('produk.id', $id)
            ->get();
            return view ('admin.produk.detail', compact('produk'));
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        $produk = DB::table('produk')->where('id',$id)->get();
        return view ('admin.produk.edit', compact('produk', 'jenis_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required |max:45',            
            'harga_beli' => 'required |numeric',            
            'harga_jual' => 'required |numeric', 
            'stok' => 'required |integer',
            'min_stok' => 'required |integer',
            'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
            'deskripsi' => 'nullable|string|min:10',
            'jenis_produk_id' => 'required |integer',           
        ],
        [
            'nama.required' => 'Nama Wajib Di Isi!',
            'nama.max' => 'Nama Maksimal 45 Karekter',
            'harga_beli.required' => 'Harga Beli Harus Di Isi!',
            'harga_beli.numeric' => 'Harus Angka!',
            'harga_jual.required' => 'Harga Jual Harus Di Isi!',
            'harga_jual.numeric' => 'Harus Angka!',
            'stok.required' => 'Stok Harus Di Isi',
            'min_stok.required' => 'Minimal Stok Harus Di Isi',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File Ekstensi Harus JPG, JPEG, GIF, PNG, SVG',
        ]
    );
        // update foto
        $foto = DB::table('produk')->select('foto')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        if(!empty($request->foto)){
            // jika ada foto lama maka hapus fotonya
            if(!empty($p->foto)) unlink('admin/img'. $namaFileFotoLama->foto);
            //proses ganti foto
            $filename = 'foto-'.uniqid().'.'.$request->foto->extension();
            $request->foto->move(public_path('admin/img'),$filename);
        }else{
            $filename = '';
        }
        //
        DB::table('produk')->where('id', $request->id)->update([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'foto'=>$filename,
            'deskripsi'=>$request->deskripsi,
            'jenis_produk_id'=>$request->jenis_produk_id,
        ]);
        return redirect('admin/produk');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('produk')->where('id', $id)->delete();
        return redirect('admin/produk');
    }
}
