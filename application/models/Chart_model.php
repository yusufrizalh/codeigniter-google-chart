<?php

class Chart_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all_data() {
        return $this->db->get('revenue')->result();
    }
}