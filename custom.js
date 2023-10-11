// This script fetches product records from the server and populates the table

$(document).ready(function () {
    // Include Header
    $("#header-container").load("header.html");

    // Include Navigation
    $("#navigation-container").load("navigation.html");

    // Fetch and display existing products
    $.ajax({
        url: "fetch-products.php", // PHP script to fetch products from the server
        method: "GET",
        success: function (data) {
            $("#products-table-body").html(data);
        },
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        },
    });

    // Include Footer
    $("#footer-container").load("footer.html");
});