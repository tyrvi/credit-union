<!DOCTYPE <html>
<html>
<head>
    <meta charset="UTF-8">
    <title>credit union test page</title>
</head>
<body>

    <h1>hello</h1>
    <?php
    echo "My first PHP script!";
    #Database=cudb;Data Source=us-cdbr-azure-central-a.cloudapp.net;User Id=b3749d9a9bbf00;Password=c55f1efd
    $servername = "cudb.us-cdbr-azure-central-a.cloudapp.net";
    $username = "b3749d9a9bbf00";
    $password = "c55f1efd";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
    ?>
</body>
</html>
