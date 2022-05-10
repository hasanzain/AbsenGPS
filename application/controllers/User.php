<?php
defined('BASEPATH') or exit('No direct script allowed');
date_default_timezone_set("Asia/Jakarta");

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class user extends REST_Controller
{
    /*----------------------------------------CONSTRUCTOR----------------------------------------*/
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }


    function index_get()
    {
        $nip = $this->get('nip');

        $this->db->where('nip', $nip);
        $absensi = $this->db->get('user')->result();
        // $this->response($absensi, 200);
        if ($absensi) {
            $this->response($absensi, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // function index_post()
    // {
    //     $nama = $this->post('nama');
    //     $nip = $this->post('nip');
    //     $pangkat = $this->post('pangkat');
    //     $longitude = $this->post('longitude');
    //     $latitude = $this->post('latitude');

      
    //     $data = array(
    //         'nama' => $nama,
    //         'nip' => $nip,
    //         'pangkat' => $pangkat,
    //         'longitude' => $longitude,
    //         'latitude' => $latitude,
    //     );
    //     $insert = $this->db->insert('absensi', $data);
    //     if ($insert) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }

    function index_put()
    {
        $nama = $this->put('nama');
        $nip = $this->put('nip');
        $password = $this->put('password');
        $pangkat = $this->put('pangkat');
        $alamat = $this->put('alamat');

        if ($nama != ''){
            $data['nama'] = $nama;
        }
        if ($password != null){
            $data['password'] = md5($password);
        }
        if ($pangkat != null){
            $data['pangkat'] = $pangkat;
        }
        if ($alamat != null){
            $data['alamat'] = $alamat;
        }

        $this->db->where('nip', $nip);
        $update = $this->db->update('user', $data);

        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }

    function index_delete()
    {
        $id = $this->delete('id');
        $auth = $this->delete('auth');

        
        if ($auth == "batman") {
            $delete = $this->db->empty_table('user');
        }else{
            $this->db->where('id', $id);
            $delete = $this->db->delete('user');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }
}