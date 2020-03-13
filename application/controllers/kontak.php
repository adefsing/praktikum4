<?php
// ini adalah baris kode yang berfungsi untuk tidak bisa secara langsung mengakses controller
defined('BASEPATH') or exit('No direct script access allowed');
//ini adalah baris kode import data file dari REST_Controller yang beradi di dalam libraris
require APPPATH . '/libraries/REST_Controller.php';
//ini adalah baris kode untuk menggunakan class REST_Controllrer lau di jadikan extend
use Restserver\Libraries\REST_Controller;

//ini adalah class "Kontak" 
class Kontak extends REST_Controller
{

    //ini adalah function yang aakan di jalankan pertama kali dan sekali secara otomatis
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        //mengget id pada url menggunakan methode get
        $id = $this->get('id');
        //if else jika tidak ada id maka akan menampilkan data sesuai id, jika tidak ada id, maka akan menampilkan data semua baris pada telepon 
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        //tampilkan data paada variable "kontak"
        $this->response($kontak, 200);
    }

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        //ini adalah baris kode array untuk merecord data yang di inputkan
        $data = array(
            'id'            => $this->post('id'),
            'nama'          => $this->post('nama'),
            'nomor'         => $this->post('nomor')
        );
        //ini adalah baris kode perintah insert daata ke database
        $insert = $this->db->insert('telepon', $data);
        //if else jika berhasil, maka akan tampil data yang baru di inputkan, dan jika gagal makan akan tampil status "fail"
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        //mengambil id pada url menggunakan methode put
        $id = $this->put('id');
        //ini adalah baris kode array untuk merecord data yang di inputkan
        $data = array(
            'id'            => $this->put('id'),
            'nama'          => $this->put('nama'),
            'nomor'         => $this->put('nomor')
        );
        //merekam variable id pada methode where
        $this->db->where('id', $id);
        //melakukan update pada tabel telepon dengan values $data yang sudah diubah data
        $update = $this->db->update('telepon', $data);

        //if else jika berhasil maka akan tampil data yang sudah diubah, jika gagal akan tampil ststus "fail"
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Menghapus salah satu data kontak
    function index_delete()
    {
        //mengambil id pada url menggunakan methode put
        $id = $this->delete('id');
        //merekam variable id pada methode where 
        $this->db->where('id', $id);
        //delete satu baris id dari table telepon, berdaasarkan id yang tersimpan di where
        $delete = $this->db->delete('telepon');
        //if else jika berhasil menghapus data maka akan tampil status "succes", jika tidak tampil ststus "fail"
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
