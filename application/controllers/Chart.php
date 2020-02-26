<?php

class Chart extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
        $this->load->helper('string');
    }

    public function index() {
        $this->load->view('chart_view');
    }

    public function getdata() {
        $data = $this->chart_model->get_all_data();
        
        // ubah data jadi format json 
        $response->cols[] = array(
            'id' => '', 
            'label' => 'Month', 
            'pattern' => '', 
            'type' => 'string'
        );
        $response->cols[] = array(
            'id' => '', 
            'label' => 'Point', 
            'pattern' => '', 
            'type' => 'number'
        );

        foreach($data as $tampil) {
            $response->rows[]['c'] = array(
                array(
                    'v' => "$tampil->revenue_month", 
                    'f' => null
                ), 
                array(
                    'v' => (int)$tampil->revenue_point, 
                    'f' => null
                )
            );
        }
        echo json_encode($response);
    }
}