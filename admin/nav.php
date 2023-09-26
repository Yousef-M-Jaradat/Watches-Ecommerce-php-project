<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <script src="https://kit.fontawesome.com/cccdab20bd.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <button id="navToggle"><i class="fa-solid fa-bars"></i></button>
    <nav id="mainNav">
        <ul>
            <img src="../watch2.png" alt="ss" width="150px">
            <li>
                <a href="../yousef">Home Page</a>
            </li>
            <li>
                <a href="../admin-dashboard/admin-view.php">Admin</a>
            </li>
            <li>
                <a href="../customer/customer-view.php">customer </a>
            </li>
            <li>
                <a href="../category/category-view.php">category</a>
            </li>
            <li>
                <a href="../product/product-view.php">product</a>
            </li>
            <li>
                <a href="../order/order-view.php">order</a>
            </li>
            <li>
                <!-- <a href="../order-item/order-item-view.php">order item</a> -->
            </li>
            <li>
                <a href="../shipment/shipment-view.php">shipment</a>
            </li>

            <li>
                <!-- <a class href="../payment/payment-view.php">payment</a> -->
            </li>
            <li>
                <a href="../coupon/coupon-view.php">coupon</a>
            </li>

            <li>
                <!-- <a href="../review/review.php">review</a> -->
            </li>
            <li>
                <a href="../messages/messages-view.php">messages</a>
            </li>

            <li>
                <!-- <a href="../wishlist/wishlist-view.php">wishlist</a> -->
            </li>
        </ul>

    </nav>


    <script>
        const navToggle = document.getElementById('navToggle');
        const mainNav = document.getElementById('mainNav');

        navToggle.addEventListener('click', () => {
            mainNav.classList.toggle('active');
        });
    </script>

</body>

</html>