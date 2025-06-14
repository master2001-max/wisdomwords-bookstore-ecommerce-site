<?php

require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="cart.css">
    <title>In cart products</title>
</head>

<body>
    <?php
    include_once 'header.php';
    ?>

    <main class="shopping-cart">
        <h1><?php echo mysqli_num_rows($all_cart); ?> Items</h1>
        <hr>

        <table>
            <thead>
                <tr>
                    <th style="font-size: medium;text-align: center;">Image</th>
                    <th style="font-size: medium;">Name</th>
                    <th style="font-size: medium;">Price</th>
                    <th style="font-size: medium;">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $total_price = 0;
                while ($row_cart = mysqli_fetch_assoc($all_cart)) {
                    $sql = "SELECT * FROM product WHERE product_id=" . $row_cart["product_id"];
                    $all_product = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($all_product)) {

                        $total_price += $row["price"];
                ?>
                        <tr>
                            <td> <img src="<?php echo $row["product_image"]; ?>" height="75px" width="75px" alt=""><br><br></td>
                            <td style="text-align: center;font-size: medium;"><?php echo $row["product_name"]; ?></td>
                            <td style="text-align: center;font-size: medium;">$<?php echo $row["price"]; ?>/-</td>

                            <td style="text-align: center;font-size: medium;"> <button class="remove" data-id="<?php echo $row["product_id"]; ?>">Remove </button></td>
                        </tr>
                <?php

                    }
                }

                ?>
                <tr class="table-bottom">
                    <td colspan="4" style="font-size: medium;"> Total:</td>
                    <!-- total price -->
                    <td style="font-size: medium;">$<?php echo number_format($total_price, 2); ?>/-</td>
                </tr>
            </tbody>
        </table>

    </main>
    <script>
        var remove = document.getElementsByClassName("remove");
        for (var i = 0; i < remove.length; i++) {
            remove[i].addEventListener("click", function(event) {
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        target.innerHTML = this.responseText;
                        target.style.opacity = .3;
                    }
                }

                xml.open("GET", "connection.php?cart_id=" + cart_id, true);
                xml.send();
            })
        }
    </script>
</body>

</html>