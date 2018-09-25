<?php
    $html=file_get_contents("https://admin.b2b-carmarket.com//test/project");
    $data=explode("<br>", $html);
    array_shift($data);

    print_r($data);

    $conn = new mysqli('localhost', 'root', '', 'cars');
    foreach ($data as $car) {
        $carData = explode(',', $car);
        $query="INSERT INTO cars (VehicleID, InhouseSellerID, BuyerID, ModelID, SaleDate, BuyDate) VALUES ($carData[0], $carData[1], $carData[2], $carData[3], '$carData[4]', '$carData[5]')";
        $executed = $conn->query($query);
        if($executed == false){
            echo("Line was not inserted into DB!");
        }
    }
    $conn->close();
?>