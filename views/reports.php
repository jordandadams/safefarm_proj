<?php

require_once '../controllers/reportsPage.class.php';

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
    <script src="../js/reports.class.js?v<?php echo filemtime('../js/reports.class.js'); ?>"></script>
    <script type="text/javascript">

        //insert js class
        const reportsjs = new Reports();

        reportsjs.displayAllCustomers();

        //jQuery stuff
        $(document).ready(function(){


        });

    </script>

</head>
<body>

    <?php require '../public/header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-primary mt-2"><b>SafeFarm Daily Reporting</b></h4>
            </div>
        </div>
        <div class="card border-primary">
            <h5 class="card-header bg-primary d-flex justify-content-between">
                <span class="text-light lead align-self-center">Current Reports</span>
                <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addCustomerModal">
                    <i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Report
                </a>
            </h5>
            <div class="card-body">
                <div class="table-responsive" id="showCustomers">
                        
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Customer Modal -->
    <div class="modal fade" id="addCustomerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light">Add New Report</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="add-customer-form" class="px-3">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="report" class="form-control form-control-lg" placeholder="Enter Report Notes..." required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" name="addCustomer" id="addCustomer" value="Add Report" class="btn btn-primary btn-block btn-lg" onClick="reportsjs.addCustomer();">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End New Customer Modal -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("table").DataTable();

            
        });

        $("body").on("click", ".deleteBtn", function(e) {
            e.preventDefault();
            del_id = $(this).attr('id');

            Swal.fire({
                title: 'Are you sure you want to delete this report?',
                text: 'Did the Regional Manager Approve this?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '../controllers/reportsPage.class.php',
                        method: 'POST',
                        data: {
                            del_id: del_id
                        },
                        success: function(result) {
                            Swal.fire(
                                'Deleted',
                                'The report has been successfully been removed!',
                                'success'
                            ).then(function(){
                                location.reload();
                            }) 
                        }
                    })
                }
            })
        });
    </script>
</body>
</html>