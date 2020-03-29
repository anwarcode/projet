<?php
    $connect = mysqli_connect("localhost", "root", "", "samidata");
    $sql = "SELECT id, Productname, Saleprice, Costprice from products";
    $results = $connect-> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 100%;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
	}
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">My Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="calculator.php">Calculator <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reports.php">Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="freports.php">Final Reports</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">

<form name="dataform" method="POST" action="send.php">
    <label>Product name</label>
    <input type='text' name='Productname'><br>
    <label>Sale Price</label>
    <input type='text' name='Saleprice'><br>
    <label>Cost Price</label>
    <input type='text' name='Costprice'>
    <div class="alert alert-success" role="alert">
                        Products Saved Successfuly
                        </div>
            <input class="btn btn-primary" type="submit" value="Save Products">
</form>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Products <b>List</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered" id="table-product">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Sale Price</th>
                        <th>Cost Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    
        if ($results-> num_rows > 0) {
            while ($row = $results-> fetch_assoc()){
                echo "<tr id=". $row["id"] ." class='tr' data-id=". $row["id"] ."><td>". $row["id"]."</td>
                        <td data-target='Productname'>". $row["Productname"]."</td>
                        <td data-target='Saleprice'>". $row["Saleprice"]."</td>
                        <td data-target='Costprice'>". $row["Costprice"]."</td>
                        <td>
                        <a class='edit' title='Edit' data-toggle='tooltip' data-role='update' data-id=". $row["id"] ."><i class='material-icons'>&#xE254;</i></a>
                        <a class='delete' title='Delete' data-toggle='tooltip' data-role='delete' data-id=". $row["id"] ."><i class='material-icons'>&#xE872;</i></a></td></tr>";
            }
        } else {
            echo "0 result";
        }
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" id="Productname" class="form-control">
              </div>
              <div class="form-group">
                <label>Saleprice</label>
                <input type="text" id="Saleprice" class="form-control">
              </div>

               <div class="form-group">
                <label>Costprice</label>
                <input type="text" id="Costprice" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">

          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are sure you want to delete this product ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="delete" class="btn btn-primary">Delete</button>
        <input type="hidden" value="" id="productId">
      </div>
    </div>
  </div>
</div>



    <script>
        $(document).ready(function (){

            //append value in input field
            $(document).on('click', 'a[data-role=update]', function (){
                var id = $(this).data('id');
                var productName = $('#'+id).children('td[data-target=Productname]').text();
                var salePrice = $('#'+id).children('td[data-target=Saleprice]').text();
                var costPrice = $('#'+id).children('td[data-target=Costprice]').text();

                $('#Productname').val(productName);
                $('#Saleprice').val(salePrice);
                $('#Costprice').val(costPrice);
                $('#userId').val(id);
                $('#myModal').modal('toggle');
            });
                    // update data
            $('#save').click(function(){
                var id = $('#userId').val();
                var productName = $('#Productname').val();
                var salePrice = $('#Saleprice').val();
                var costPrice = $('#Costprice').val();

                $.ajax({
                    url     : 'trait.php',
                    method : 'POST',
                    data    : {id : id, Productname : productName, Saleprice : salePrice, Costprice : costPrice},
                    success : function(response, data){
                        $('#'+id).children('td[data-target=Productname]').text(productName);
                        $('#'+id).children('td[data-target=Saleprice]').text(salePrice);
                        $('#'+id).children('td[data-target=Costprice]').text(costPrice);
                        $('#myModal').modal('toggle');
                        data = JSON.parse(data);
                    }
                });
            });

            $(document).on('click', 'a[data-role=delete]', function (){
                var dataId = $(this).data('id');
                $('#myModal2').modal('toggle');
                $('#myModal2 #productId').val(dataId);
            });
            $('#delete').click(function(){
                var id = $('#myModal2 #productId').val();
                $.ajax({
                    url     : 'delete.php',
                    method : 'POST',
                    data    : {id : id},
                    success : function(response){
                        $('#myModal2').modal('toggle');
                        $('#table-product tr[id='+id+']').remove();
                    }
                });
            });
        });

    
    </script> 
</body>
</html>                            