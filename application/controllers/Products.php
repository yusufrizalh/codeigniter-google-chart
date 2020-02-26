<?php 

class Products extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    function index() {
        $tampil['products'] = $this->product_model->get_products();
        $this->load->view('product_view', $tampil);
    }

    function form_add_product() {
        $this->load->view('add_product_view');
    }

    function save_product() {
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $this->product_model->save_product($product_name, $product_price);
        redirect('products');
    }

    function delete_product() {
        $product_id = $this->uri->segment(3);
        $this->product_model->delete_product($product_id);
        redirect('products');
    }

    function get_product_id() {
        $product_id = $this->uri->segment(3);
        $result = $this->product_model->get_product_id($product_id);
        if($result->num_rows() > 0) {
            $baris = $result->row_array();
            $data = array(
                'product_id' => $baris['product_id'], 
                'product_name' => $baris['product_name'], 
                'product_price' => $baris['product_price']
            );
            $this->load->view('edit_product_view', $data);
        } else {
            echo "Data Tidak Ditemukan!";
        }
    }

    function edit_product() {
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $this->product_model->edit_product($product_id, $product_name, $product_price);
        redirect('products');
    }
}