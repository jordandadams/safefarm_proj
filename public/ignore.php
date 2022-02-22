<?php
include '../public/nav.php';
include '../public/newUserModal.php';

//instantiates db class and calls a method to test array based on params
/*$dbObject = new Database();
$fetch = $dbObject->getData('users', "first_name = 'Jordan'");
print_r($fetch);*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP w PHP OOP</title>
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
    <script src="../js/homeUsers.class.js?v=<?php echo filemtime('../js/homeUsers.class.js'); ?>"></script>
    <script type="text/javascript">

        const homeUsers = new HomeUsers();

        $(function () {

            //DataTables Function
            $(document).ready(function(){
                $("#users_table").DataTable();
            });




        });

    </script>
    
</head>

<body>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h4 class="text-center text-danger font-weght-normal my-3">CRUD Application OOP PHP</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <h4 class="mt-2 text-primary">All users in database!</h4>
    </div>
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary m-1 float-right" id="newUserBtn" data-toggle="modal" data-target="#newUserModal"><i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp;Add New User</button>
      <button type="button" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to CSV</button>
    </div>
  </div>
  <hr class="">
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive" id="show_user">
        <table class="table table-striped table-sm table-bordered" id="users_table">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="users_table_tbody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


</body>
</html>