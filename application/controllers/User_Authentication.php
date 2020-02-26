<?php 

class User_Authentication extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('authentication_model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function register_view() {
        $this->load->view('register_view');
    }

    // membuat validasi form register
    public function user_register() {
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            $isian = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'), 
                'user_password' => $this->input->post('user_password')
            );
            $result = $this->authentication_model->registration_insert($isian);

            if($result == TRUE) {
                $isian['pesan'] = 'Registrasi berhasil!';
                $this->load->view('login_view', $isian);
            } else {
                $isian['pesan'] = 'Registrasi gagal!';
                $this->load->view('register_view', $isian);
            }
        }
    }

    // membuat validasi form login
    public function user_login() {
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            // cek session 
            if(isset($this->session->userdata['logged_in'])) {
                $this->load->view('home_view');
            } else {
                $this->load->view('login_view');
            }
        } else {
            $data = array(
                'user_name' => $this->input->post('user_name'), 
                'user_password' => $this->input->post('user_password')
            );
            $result = $this->authentication_model->user_login($data);

            if($result == TRUE) {
                $user_name = $this->input->post('user_name');
                $result = $this->authentication_model->user_profile($user_name);
                if($result != FALSE) {
                    $session_data = array(
                        'user_name' => $result[0]->user_name, 
                        'user_email' => $result[0]->user_email
                    );
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('home_view');
                }
            } else {
                $pesan_error = array(
                    'pesan_error' => 'Invalid username atau password!'
                );
                $this->load->view('login_view', $pesan_error);
            }
        }
    }

    public function user_logout() {
        $session_array = array(
            'user_name' => ''
        );
        $this->session->unset_userdata('logged_in', $session_array);
        $pesan['pesan'] = 'Berhasil logout!';
        $this->load->view('login_view', $pesan);
    }

}