<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ams";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if an image file was uploaded
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // Get the image details
        $filename = $file['name'];
        $filetmp = $file['tmp_name'];

        // Move the uploaded file to a permanent location
        $destination = 'uploads' . $filename;
        move_uploaded_file($filetmp, $destination);

        // Prepare the SQL statement to insert the image path into the database
        $sql = "INSERT INTO image (image) VALUES ('$destination')";

        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded and saved in the database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>






