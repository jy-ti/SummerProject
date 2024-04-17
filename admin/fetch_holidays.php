<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "ams";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// API Key
$apiKey = "afb7771796b1e5e3ca2ee615257b2ef333e84720";

// API URL
$apiUrl = "https://calendarific.com/api/v2/holidays?country=NP&year=2023&api_key=" . $apiKey;

// Fetch holidays from the API
$data = file_get_contents($apiUrl);
$response = json_decode($data, true);

// Check if API response is successful
if ($response && $response['meta']['code'] == 200) {
    $holidays = $response['response']['holidays'];

    // Insert holidays into the database
    foreach ($holidays as $holiday) {
        $name = mysqli_real_escape_string($conn, $holiday['name']);
        $date = $holiday['date']['iso'];
        $description = mysqli_real_escape_string($conn, $holiday['description']);

        // Check if the holiday already exists in the database
        $checkQuery = "SELECT * FROM holidays WHERE holiday_date = '$date'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            // Insert the holiday into the database
            $insertQuery = "INSERT INTO holidays (holiday_name, holiday_date, description) VALUES ('$name', '$date', '$description')";
            mysqli_query($conn, $insertQuery);
        }
    }

    echo "Holidays successfully fetched and saved to the database.";
} else {
    echo "Failed to fetch holidays. Error: " . $response['meta']['error_detail'];
}

// Close the database connection
mysqli_close($conn);
?>
