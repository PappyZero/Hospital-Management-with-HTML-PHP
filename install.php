<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$database_name = "phc_db";
$sql = "CREATE DATABASE IF NOT EXISTS $database_name";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists<br>";
} else {
    echo "Error creating database: <br>" . $conn->error;
}

// Select the database
$conn->select_db($database_name);

// SQL query to create admin table
$admin_sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(250),
    first_name VARCHAR(250),
    email VARCHAR(250),
    username VARCHAR(100),
    password VARCHAR(250),
    profile VARCHAR(100),
    status TINYINT(1) DEFAULT 1,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if ($conn->query($admin_sql) === TRUE) {
    echo "Admin Table created successfully or already exists<br>";
} else {
    echo "Error creating admin table: <br>" . $conn->error;
}


// SQL query to create doctor table
$doctor_sql = "CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(250),
    first_name VARCHAR(250),
    email VARCHAR(250),
    username VARCHAR(100),
    password VARCHAR(250),
    specialization VARCHAR(250),
    profile VARCHAR(100),
    status TINYINT(1) DEFAULT 1,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if ($conn->query($doctor_sql) === TRUE) {
    echo "Doctor Table created successfully or already exists<br>";
} else {
    echo "Error creating doctor table: <br>" . $conn->error;
}

// Close connection
$conn->close();

