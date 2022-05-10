<?php
defined('BASEPATH') or exit('No direct script allowed');
date_default_timezone_set("Asia/Jakarta");

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class Realtime extends REST_Controller
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
        $realtime = $this->db->get('realtime')->result();

        if ($realtime) {
            $this->response($realtime, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_post()
    {
        $nip = $this->post('nip');
        $longitude = $this->post('longitude');
        $latitude = $this->post('latitude');

      
        $data = array(
            'nip' => $nip,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'jam' => date("h:i:sa"),
            'tanggal' => date("Y-m-d"),
        );
        $insert = $this->db->insert('realtime', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $nip = $this->put('nip');
        $longitude = $this->put('longitude');
        $latitude = $this->put('latitude');

        $data = array(
            'nip' => $nip,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'jam' => date("h:i:sa"),
            'tanggal' => date("Y-m-d"),
        );

        $this->db->where('nip', $nip);
        $update = $this->db->update('realtime', $data);

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
            $delete = $this->db->empty_table('realtime');
        }else{
            $this->db->where('id', $id);
            $delete = $this->db->delete('realtime');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }
}