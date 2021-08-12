<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Buku_model;

class buku extends Controller
{
    protected $mbuku;
    protected $table = "buku"; 

    public function __construct()
    {
        $this->mbuku = new Buku_model();
    }

    public function index()
    {
        $getdata = $this->mbuku->getdata();

        $data = array(
            'dataBuku' => $getdata,
        );

        return view('perpustakaan/buku',$data);
    }

    function simpan(){
        $kode_buku = $this->request->getPost("kodebuku");
        $buku = $this->request->getPost("buku");
        $stok = $this->request->getPost("stok");
        $harga = $this->request->getPost("harga");

        $data = [
            'kode_buku' => $kode_buku,
            'buku' => $buku,
            'stok' => $stok,
            'harga' => $harga,


        ];
        try {
            $simpan = $this->mbuku->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/buku') . "';</script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/buku') . "';</script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kode Barang Sudah Ada'); window.location='" . base_url('/buku') . "';</script>";
        }
    }
}