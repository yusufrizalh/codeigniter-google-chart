<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $tampil['title'] = "Halaman Administrator";
        $tampil['content'] = "Ini adalah halaman administrator";
        $this->load->view('home_view', $tampil);
    }
}