<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <center><h1>Add New Product</h1></center>
        <div class="col-md-6 offset-md-3">
            <form method="post" 
                action="<?php echo site_url('products/save_product'); ?>">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" name="product_name" 
                        placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="text" class="form-control" name="product_price" 
                        placeholder="Product Price" required>
                </div>
                <button type="submit" class="btn btn-outline-info btn-block">
                    Save Product
                </button>
                <a href="<?php echo site_url('products'); ?>" 
                    type="button" class="btn btn-outline-info btn-block">
                    View Products
                </a>
            </form>
        </div>
    </div>
</body>
</html>