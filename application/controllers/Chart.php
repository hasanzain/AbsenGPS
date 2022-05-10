<?php
defined('BASEPATH') or exit('No direct script allowed');

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class chart extends REST_Controller
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

        if ($id == '') {
            $kontak = $this->db->get('suhu')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('suhu')->result();
        }

        $this->response($kontak, 200);
    }

    function index_post()
    {
        $data = array(
            'nilai'    =>    $this->post('nilai'),
        );
        $insert = $this->db->insert('suhu', $data);

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'id'    =>    $this->put('id'),
            'nilai'    =>    $this->put('nilai'),
        );

        $this->db->where('id', $id);
        $update = $this->db->update('suhu', $data);

        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }

    function index_delete()
    {
        $id = $this->delete('id');

        $this->db->where('id', $id);

        $delete = $this->db->delete('suhu');

        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail'), 502);
        }
    }
}