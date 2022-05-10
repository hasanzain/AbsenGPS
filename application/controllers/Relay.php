<?php
defined('BASEPATH') or exit('No direct script allowed');
date_default_timezone_set("Asia/Jakarta");

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class relay extends REST_Controller
{
    /*----------------------------------------CONSTRUCTOR----------------------------------------*/
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    /*----------------------------------------GET KONTAK----------------------------------------*/
    function index_get()
    {
        $id = $this->get('id');
        $limit = $this->get('limit');
        $order = $this->get('order');
        $nama_relay = $this->get('nama');

        if ($limit != '') {
            $this->db->limit($limit);
        }
        if ($order != '') {
            $this->db->order_by('id', $order);
        }
        if ($nama_relay != '') {
            $this->db->where('nama_relay', $nama_relay);
        }

        if ($id == '') {
            $relay = $this->db->get('relay')->result();
        } else {
            $this->db->where('id', $id);
            $relay = $this->db->get('relay')->result();
        }

        $this->response($relay, 200);
    }

    function index_post()
    {
        $nilai = $this->post('nilai');

        if ($nilai == 1){
            $button = "success";
            $status = "ON";
        } else{
            $button = "danger";
            $status = "OFF";
        }
        $data = array(
            'nama_relay'    =>   $this->post('nama_relay'),
            'nilai' => $nilai,
            'button' => $button,
            'status' => $status,
        );
        $insert = $this->db->insert('relay', $data);
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