<?php

class Product_model extends CI_Model {
    function get_products() {
        $result = $this->db->get('products');   // active record 
        return $result;
    }

    function save_product($product_name, $product_price) {
        $isian = array(
            'product_name' => $product_name, 
            'product_price' => $product_price
        );
        $this->db->insert('products', $isian);
    }

    function delete_product($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
    }

    function get_product_id($product_id) {
        $perintah = $this->db->get_where('products', 
            array('product_id' => $product_id));
        return $perintah;
    }

    function edit_product($product_id, $product_name, $product_price) {
        $isian = array(
            'product_name' => $product_name, 
            'product_price' => $product_price
        );
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $isian);
    }
}

?>