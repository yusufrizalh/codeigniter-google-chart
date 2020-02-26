<?php
    if(isset($this->session->userdata['logged_in'])) {
        $user_name = ($this->session->userdata['logged_in']['user_name']);
        $user_email = ($this->session->userdata['logged_in']['user_email']);
    } else {
        header("location: user_authentication/index");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>

    <!-- memanggil library bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Hello, Inixindo Surabaya!</h1>
            <p class="lead">Belajar Framework PHP Codeigniter</p>
            <hr class="my-4">
            <p>
                <br>
                Selamat Datang, 
                <b><?php echo $user_name; ?></b>
            </p>
            <p><b>
                    <a class="btn btn-info btn-sm" 
                        href="<?php echo site_url('user_authentication/user_logout'); ?>">
                        Logout 
                    </a>
                </b>
            </p>            
        </div>

        <table class="table table-striped table-borderless table-hover">
        <thead>
            <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
        </table>
    </div>

    <!-- memanggil library jquery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>
</html>