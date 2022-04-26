<?php

require_once '../controllers/homePage.class.php';

?>

<!-- Register Form Start -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeFarm Insurance Employee Home</title>
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="../public/homeStyle.css">
     <!-- Latest compiled and minified CSS | BS4 -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css"/>
    <!-- jQuery library & Latest compiled JavaScript | BS4 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include JS File -->
    <script src="../js/home.class.js?v<?php echo filemtime('../js/home.class.js'); ?>"></script>
    <script type="text/javascript">

        //insert js class
        const home = new Home();

        //jQuery stuff
        $(document).ready(function(){


        });

    </script>

</head>
<body>

    <?php require '../public/header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <img src="../public/SFlogo.png" class="img-fluid rounded mx-auto d-block" alt="Responsive Image" style="height: 250px; width: 250px;">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br />
                <h1 class="text-center"><b>Welcome to SafeFarm Insurance</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"><b>Customer Portal</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br />
                <br />
                <br />
                <h3 class="text-center"><i>Click any of the options above to get started!</i></h3>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>
</html>