
<?php
$conn = new mysqli('localhost', 'root', '', 'cars');
$query = "SELECT * FROM buyers INNER JOIN cars ON buyers.BuyerId=cars.BuyerID";
$result = $conn->query($query);
?>
<!DOCTYPE HTML PUBLIC>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
  </head>
  <body>
  <table id="cars" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>LastName</th>
            <th>VehicleID</th>
            <th>InhouseSellerID</th>
            <th>BuyerID</th>
            <th>ModelID</th>
            <th>SaleDate</th>
            <th>BuyDate</th>
        </tr>
    </thead>
    <?php  
        while($row = $result->fetch_assoc())  
            {  
                echo '  
                        <tr>  
                            <td>'.$row["Name"].'</td>  
                            <td>'.$row["LastName"].'</td>  
                            <td>'.$row["VehicleID"].'</td>  
                            <td>'.$row["InhouseSellerID"].'</td>  
                            <td>'.$row["BuyerID"].'</td>
                            <td>'.$row["ModelID"].'</td>  
                            <td>'.$row["SaleDate"].'</td>  
                            <td>'.$row["BuyDate"].'</td>    
                        </tr>  
                        ';  
            }  
    ?>  
</table>
<script type="text/javascript">
$(document).ready(function(){ 
    $('#cars').DataTable();
});
</script>
  </body>
  </html>