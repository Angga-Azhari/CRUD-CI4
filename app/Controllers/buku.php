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

    function edit(){
        $id_buku = $this->request->getPost("id_buku");
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

        $where = ['id_buku' => $id_buku];
        try {
            $edit = $this->mbuku->editData($this->table, $data,$where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diedit'); window.location='" . base_url('/buku') . "';</script>";
            } else {
                echo "<script>alert('Data Gagal Diedit'); window.location='" . base_url('/buku') . "';</script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kode Barang Sudah Ada'); window.location='" . base_url('/buku') . "';</script>";
        }
    }

    function hapus($kode_buku){

        $where = ['kode_buku' => $kode_buku];
        try {
            $hapus = $this->mbuku->hapusData($this->table,$where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Di hapus'); window.location='" . base_url('/buku') . "';</script>";
            } else {
                echo "<script>alert('Data Gagal Di hapus'); window.location='" . base_url('/buku') . "';</script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kode Barang Sudah Ada'); window.location='" . base_url('/buku') . "';</script>";
        }
    }
}