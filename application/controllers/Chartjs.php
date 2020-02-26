<?php 

class Chartjs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'html', 'form'));
    }

    public function chartjs() {
        $query = $this->db->query("SELECT revenue_month as month, 
            revenue_point as point1 FROM revenue");
        
        $result = $query->result();
        $data = [];

        foreach($result as $baris) {
            $data['label'][] = $baris->month;
            $data['data'][] = (int)$baris->point1;
        }
        $data['chart_data'] = json_encode($data);
        $this->load->view('chartjs_view', $data);
    }
}