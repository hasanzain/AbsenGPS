<?php
defined('BASEPATH') or exit('No direct script allowed');
date_default_timezone_set("Asia/Jakarta");

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class Absensi extends REST_Controller
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
        
        if ($nip == '') {
            $absensi = $this->db->get('absensi')->result();
        } else {
            $this->db->where('nip', $nip);
            $absensi = $this->db->get('absensi')->result();
        }

        if ($absensi) {
            $this->response($absensi, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_post()
    {
        $nama = $this->post('nama');
        $nip = $this->post('nip');
        $pangkat = $this->post('pangkat');
        $longitude = $this->post('longitude');
        $latitude = $this->post('latitude');

      
        $data = array(
            'nama' => $nama,
            'nip' => $nip,
            'pangkat' => $pangkat,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'jam' => date("h:i:sa"),
            'tanggal' => date("Y-m-d"),
        );
        $insert = $this->db->insert('absensi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $nama_relay = $this->put('nama_relay');
        $nilai = $this->put('nilai');

        if ($nilai != null){
            if ($nilai == 1) {
                $data['status'] = "ON";
                $data['button'] = "succes";
                $data['nilai'] = $nilai;
            }else{
                $data['status'] = "OFF";
                $data['button'] = "danger";
                $data['nilai'] = $nilai;
            }
        }

        $this->db->where('nama_relay', $nama_relay);
        $update = $this->db->update('relay', $data);

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
            $delete = $this->db->empty_table('relay');
        }else{
            $this->db->where('id', $id);
            $delete = $this->db->delete('arus_pompa_1');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }
}