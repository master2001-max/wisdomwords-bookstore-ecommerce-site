<?php
require_once 'connection.php'; // Adjust path if needed
session_start();


// Check if a search query was submitted
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Prepare and execute the SQL query to search for the product
    $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE ?");
    $search_param = "%" . $search . "%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a product is found, redirect to the cart page with product details
    if ($result->num_rows > 0) {
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row; // Store each matching product in the array
        }
        // Pass the search results to the cart page
        session_start();
        $_SESSION['search_results'] = $products;
        header("Location: ../products/home.php");
        exit();
    } else {
        // If no products are found, redirect to the cart page with an error message
        echo "<script>alert('No products found.'); window.location.href='../products/home.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    // If no search query is submitted, redirect to the cart page
    header("Location: ../products/home.php");

    exit();
}
