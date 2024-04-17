<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "summer_project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];

    // Check if a product image is uploaded
    if (isset($_POST['submit'])) {
    // Check if an image file was uploaded
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // Get the image details
        $filename = $file['name'];
        $filetmp = $file['tmp_name'];

        // Move the uploaded file to a permanent location
        $destination = 'images' . $filename;
        move_uploaded_file($filetmp, $destination);

            // Prepare the SQL statement
            $sql = "INSERT INTO beautyproduct (product_image, name, brand, price) VALUES ('$destination', '$name', '$brand', '$price')";

            // Execute the SQL statement
            if (mysqli_query($conn, $sql)) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading product image.";
        }
    } else {
        echo "No product image uploaded.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Product</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label>Product Image</label>
         <input type="file" name="image" accept="image/*">
        

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>

        <input type="submit" name="submit" value="Upload">
    </form>
</div>
</body>
</html>