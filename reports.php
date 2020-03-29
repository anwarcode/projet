<?php
    $connect = mysqli_connect("localhost", "root", "", "samidata");
    $sql = "SELECT * FROM calculator";
    $results = mysqli_query($connect, $sql);
    $results2 = mysqli_query($connect, $sql);

       
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reports</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
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
    <div class="row">
    <div class='col-md-5'>
        <div class="form-group">
           <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
           <label>From :</label>
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"/>
                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
           <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
           <label>To :</label>
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"/>
                <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Reports <b>List</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Netprofit</th>
                        <th>ID</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    
                    if ($results-> num_rows > 0) {
                        while ($row = $results-> fetch_assoc()){
                            echo "<tr id=". $row["id"] ." class='tr' data-id=". $row["id"] .">
                            <td data-target='Datetime' id='openup'>". $row["Datetime"]."</td>
                                    <td data-target='Saleprice'>500Dh</td>
                                    <td>". $row["id"]."</td></tr>";
                        }
                    } else {
                        echo "0 result";
                    }
                                    ?>
                </tbody>
                <!-- <tfoot>
                    <tr>
                    <td>Total Net Profit</td>
                    <td id="val" class="total net"></td>
                    </tr>
                </tfoot> -->
            </table>
        </div>

    </div>     

    <div class="modal fade" id="centralModalFluid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-fluid modal-xl" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Reports For date</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">
          <div class="table-wrapper">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Total Delivred</th>
                        <th>Delivery Rate</th>
                        <th>Delivery Cost</th>
                        <th>Total Cost Price</th>
                        <th>Ads</th>
                        <th>Cost Per Delivered</th>
                        <th>Confirm Fees</th>
                        <th>Capital</th>
                        <th>Total Expense</th>
                        <th>Net Profit</th>
                        <th>Net Profit Per Order</th>
                        <th>Expenses Per Order</th>
                    </tr>

                </thead>
                <tbody>

                <?php
                    
                    if ($results2-> num_rows > 0) {
                        while ($row = $results2-> fetch_assoc()){
                    echo "<tr id=". $row["id"] ." class='tr' data-id=". $row["id"] .">
                      <td>". $row["Productname"]."</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td>
                            <td>300 Dh</td></tr>";
                        }
                    } else {
                        echo "0 result";
                    }
                    ?>
                </tbody>
            </table>

            <table class="table table-bordered" id="table">
                <tfoot>
                    <tr>
                        <th>Capital</th>
                        <td>300 Dh</td>
                        <th>Total Net Profit of All Products</th>
                        <td>300 Dh</td>
                        <th>Total Expenses</th>
                        <td>300 Dh</td>
                    </tr>
            </table>
        </div>
          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker({
            format: 'L'
        });
        $('#datetimepicker8').datetimepicker({
            useCurrent: false,
            format: 'L'
        });
        $("#datetimepicker7").on("change.datetimepicker", function (e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function (e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
    });
</script>
        <script type="text/javascript">
   $(document).ready(function (){
        $('#openup').click(function(){
                $('#centralModalFluid').modal('toggle');
            });
        });
</script>
<script>
            
        </script>

</body>
</html>                            