<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <h3>Product List</h3>
        <a href="<?php echo site_url('products/form_add_product'); ?>" 
            type="button" class="btn btn-outline-info">
            Add New Product
        </a>
        <table class="table table-striped table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <!-- mengambil data dari table products -->
            <?php 
                $no = 0;
                foreach ($products->result() as $baris) : 
                    $no++;
            ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <th scope="row"><?php echo $baris->product_name; ?></th>
                <th scope="row"><?php echo number_format($baris->product_price); ?></th>
                <th scope="row">
                    <a href="<?php echo site_url('products/get_product_id/'.$baris->product_id); ?>" 
                    type="button" class="btn btn-sm btn-outline-warning">Edit</a> 
                    <a href="<?php echo site_url('products/delete_product/'.$baris->product_id); ?>" 
                    type="button" class="btn btn-sm btn-outline-danger">Delete</a> 
                </th>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>
</body>
</html>