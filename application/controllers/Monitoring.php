<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('nip')=='') {
            redirect('auth');
        }
        
    }

    public function index()
    {   
        $nip = $this->input->post('nip');
        $tanggal = $this->input->post('tanggal');

        if($nip != null){
            $this->db->where('nip', $nip);
        }

        if($tanggal != null){
            $this->db->where('tanggal', $tanggal);
        }
        
        if($tanggal != null && $nip != null){
        $this->db->limit(50);
        }


        $this->db->order_by('id',"DESC");
        $data = array(
            'absensi' => $this->db->get('absensi')
        );

        $this->load->view('header/header');
        $this->load->view('v_monitoring',$data);
        $this->load->view('header/footer');
    }


    public function export_csv()
    {
        $nip = $this->input->post('nip');
        $tanggal = $this->input->post('tanggal');

        if($nip != null){
            $this->db->where('nip', $nip);
        }

        if($tanggal != null){
            $this->db->where('tanggal', $tanggal);
        }

        $file_name = 'daftarabsensi_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$file_name"); 
        header("Content-Type: application/csv;");
    
        // get data 
        $data = $this->db->get('absensi');

        // file creation 
        $file = fopen('php://output', 'w');
    
        $header = array("id","Nama","NIP","Pangkat","Lokasi","Jam","Tanggal"); 
        fputcsv($file, $header);
        foreach ($data->result_array() as $key => $value)
        { 
        fputcsv($file, $value); 
        }
        fclose($file); 
        exit; 
        
    }

     public function user_list()
    {
        $this->db->limit(10);
        $data = array(
            'user' => $this->db->get('user')
        );

        $this->load->view('header/header');
        $this->load->view('v_user_list',$data);
        $this->load->view('header/footer');
    }

    public function location_range_list()
    {
        $data = array(
            'location_range' => $this->db->get('location_range')
        );

        $this->load->view('header/header');
        $this->load->view('v_location_range_list',$data);
        $this->load->view('header/footer');
    }

    public function update_location_range()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $data = array(
            'location_range' => $this->db->get('location_range')
        );

        $this->load->view('header/header');
        $this->load->view('v_update_location_range',$data);
        $this->load->view('header/footer');
    }

    public function update_location_range_()
    {
        $id = $this->input->post('id');
        $latitudeMax = $this->input->post('latitudeMax');
        $latitudeMin = $this->input->post('latitudeMin');
        $longitudeMax = $this->input->post('longitudeMax');
        $longitudeMin = $this->input->post('longitudeMin');
        
        
        $data = [
           'latitudeMin' => $latitudeMin,
           'latitudeMax' => $latitudeMax,
           'longitudeMin' => $longitudeMin,
           'longitudeMax' => $longitudeMax
        ];

        $this->db->where('id', $id);
        $this->db->update('location_range', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lokasi Berhasil Diperbarui</div>');
        redirect('monitoring/location_range_list');
    }

    public function realtime()
    {   
        $nip = $this->input->post('nip');
        $tanggal = $this->input->post('tanggal');

        if($nip != null){
            $this->db->where('nip', $nip);
        }

        if($tanggal != null){
            $this->db->where('tanggal', $tanggal);
        }
        
        if ($tanggal != null && $nip != null) {
            $this->db->limit(50);
        }
        $data = array(
            'realtime' => $this->db->get('realtime')
        );

        $this->load->view('header/header');
        $this->load->view('v_realtime',$data);
        $this->load->view('header/footer');
    }

    public function tes()
    {
        $this->load->view('v_tes');
        
    }

    public function detail()
    {
         $data = array(
            'relay' => $this->db->get('relay')
        );
        $this->load->view('header/header');
        $this->load->view('v_detail',$data);
        $this->load->view('header/footer');
    }

    public function relay()
    {

        $data = array(
            'relay' => $this->db->get('relay')
        );
        $this->load->view('header/header');
        $this->load->view('v_relay', $data);
        $this->load->view('header/footer');
   
        
    }

    public function reset_kwh()
    {
        $request = 0;
        $update = 0;
        $this->db->where('id', '1');
        $data = $this->db->get('reset_kwh');
        foreach ($data -> result_array() as $key) {
            $request = $key['value'];
        }
        if ($request == '1') {
            $update=0;
        }else{
            $update=1;
        }
        $baru = array(
            'value' => $update
        );
        $this->db->where('id', '1');
        $this->db->update('reset_kwh', $baru);
        redirect('detail?name=panel_1');
        
        
    }

    public function update_relay()
    {
        $id = $this->input->get('id');
        $nilai = $this->input->get('nilai');
        
        if ($nilai == 1) {
            $nilaibaru = 0;
            $button = 'danger';
            $status = 'OFF';
        }else{
            $nilaibaru = 1;
            $button = 'success';
            $status = 'ON';
        }
        $object = array(
            'button' => $button,
            'status' => $status,
            'nilai' => $nilaibaru
         );

        $this->db->where('id', $id);
        $this->db->update('relay', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lokasi Berhasil Diperbarui</div>');
        redirect('monitoring/detail');
        
        
    }

    public function chart()
    {
        $this->load->view('header/header');
        $this->load->view('v_chart');
        $this->load->view('header/footer');
    }

    public function Report(){
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $tabel = $this->input->post('fromreport');
        $tanggal = $this->input->post('tanggal');
        $until = $this->input->post('until');
        $time = $this->input->post('time');
        $timeuntil = $this->input->post('timeuntil');
        $customer = $this->session->userdata('customer');
        
        
        $data = array(
            'tabel' => $this->db->get('report')->result_array()
        );
        
        if ($tabel != null) {
            if ($tanggal != null) {
                $this->db->where('customer', $customer);

                if ($until != null) {
                    $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($tanggal)). '" and "'. date('Y-m-d', strtotime($until)).'"');
                }else{
                    $this->db->where('tanggal', $tanggal);

                }
                
                
                
                // Panggil class PHPExcel nya
                $excel = new PHPExcel();

                // Settingan awal fil excel
                $excel->getProperties()->setCreator('onprojek.com')
                                    ->setLastModifiedBy('My Notes Code')
                                    ->setTitle("REPORT ".$tabel)
                                    ->setSubject($tabel)
                                    ->setDescription("Laporan Monitoring Panel 3 fasa")
                                    ->setKeywords("Panel listrik");

                // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
                $style_col = array(
                    'font' => array('bold' => true), // Set font nya jadi bold
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                    'borders' => array(
                        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                    )
                );

                // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
                $style_row = array(
                    'alignment' => array(
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                    ),
                    'borders' => array(
                        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                    )
                );

                $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Monitoring ".$tabel);
                $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
                $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

                // Buat header tabel nya pada baris ke 3
                $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
                $excel->setActiveSheetIndex(0)->setCellValue('B3', "Tegangan"); // Set kolom B3 dengan tulisan "NIS"
                $excel->setActiveSheetIndex(0)->setCellValue('C3', "Arus"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('D3', "Daya"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
                $excel->setActiveSheetIndex(0)->setCellValue('E3', "Frekuensi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
                $excel->setActiveSheetIndex(0)->setCellValue('F3', "KWH"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
                $excel->setActiveSheetIndex(0)->setCellValue('G3', "Waktu"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
                $excel->setActiveSheetIndex(0)->setCellValue('H3', "Tanggal"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"


                // Apply style header yang telah kita buat tadi ke masing-masing kolom header
                $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);

                // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
                //$siswa = $this->SiswaModel->view();
                $this->db->where('waktu BETWEEN "'. date('h:i-sa', strtotime($time)). '" and "'. date('h:i:sa', strtotime($timeuntil)).'"');
                $export = $this->db->get($tabel)->result_array();
                // var_dump($export);
                // die;

                $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
                foreach($export as $key){ // Lakukan looping pada variabel siswa
                    $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $key['tegangan']." V");
                    $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $key['arus']." A");
                    $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $key['daya'] ." W");
                    $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $key['frekuensi']." Hz" );
                    $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $key['kwh']);
                    $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $key['waktu']);
                    $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $key['tanggal']);
                    
                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
                    
                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
                }

                // Set width kolom
                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D
                $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
                $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
                $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom D
                
                // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
                $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight();

                // Set orientasi kertas jadi LANDSCAPE
                $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

                // Set judul file excel nya
                $excel->getActiveSheet(0)->setTitle("Laporan Monitoring Panel");
                $excel->setActiveSheetIndex(0);

                // Proses file excel
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="Laporan Monitoring Panel.xlsx"'); // Set nama file excel nya
                header('Cache-Control: max-age=0');

                $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
                $write->save('php://output');


            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tanggal tidak boleh kosong</div>');
                redirect('monitoring/report');
            }
        }else{
            $this->load->view('header/header');
            $this->load->view('v_report',$data);
            $this->load->view('header/footer');
        }
        
       
    }

    public function adduser()
    {
       
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required|is_unique[user.nip]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]');

        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view('header/header');
        $this->load->view('v_adduser');
        $this->load->view('header/footer');
        } else {
            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'nip' => htmlspecialchars($this->input->post('nip',true)),
                'password' => md5($this->input->post('password')),
                'pangkat' => htmlspecialchars($this->input->post('pangkat',true)),
                'alamat' => htmlspecialchars($this->input->post('alamat',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                );
            if ($this->db->insert('user', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan</div>');
                redirect('monitoring/adduser');
            }else{
                echo "error";
            }
            
            
        }
    }

    public function delete_user( $id = NULL )
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        
        if ($this->db->delete('user')) {
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect('monitoring/user_list');
        }else{
            // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            redirect('monitoring/user_list');
        }
        

    }

}