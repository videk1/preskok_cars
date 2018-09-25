<?php 
function generateRandomName($length) {
    // gets random string of lenghth from parameter
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$conn = new mysqli('localhost', 'root', '', 'cars');
$buyerIDsQuery = "SELECT DISTINCT BuyerID FROM cars";
$executedBuyersIds = $conn->query($buyerIDsQuery);
if($executedBuyersIds == false){
    echo("Could not fetch buyer ids");
    exit;
}
if ($executedBuyersIds->num_rows > 0) {
    while($data = $executedBuyersIds->fetch_assoc()) {
        $name = generateRandomName(rand(3, 10)); // gets random name and Last name
        $lastName = generateRandomName(rand(5, 14));
        $buyerID = $data["BuyerID"]; // we got id from DB
        $insertQuery = "INSERT INTO buyers (BuyerID, Name, LastName) VALUES('$buyerID', '$name', '$lastName')";
        $executedInsert = $conn->query($insertQuery);
        if($executedInsert == false){
            echo("Insert into failed");
            exit;
        }
        echo("Sucessfully inserted: " . $name . ' ' . $lastName . ' for ID: ' . $buyerID . '<br>');
    }
}
$conn->close();
?>