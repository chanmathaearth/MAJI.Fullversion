<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>menuset</title>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .menu-item {
            width: 20%;
            margin: 2rem;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            transition: transform 0.3s ease-in-out;
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }
    </style>
    <script src="fetchmainNav.js"></script>
    <script src="fetchNavbar.js"></script>
    <script src="fetchBasket.js"></script>
</head>

<body class="bg-white">

    <div id="mainnavbar" class='text-nowrap'></div>

    <div class="flex justify-cente ">
        <div id="navbar" class="flex text-nowrap p-6 z-50 overflow-x-auto ml-[10%] mr-[10%]  "></div>
    </div>

    <div class="grid w-full h-screen sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
        <div class="md:col-span-3 sm:col-span-4 items-center justify-center">

        <?php
        if (isset($_GET['menuTypeId'])) {

            $menuTypeId = $_GET['menuTypeId'];

        } else {
            $menuTypeId = 6;    
        }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "maji";

            // Create connection <div id="basket" class="w-w-1/4"></div>
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM menu WHERE menuTypeID = $menuTypeId;";
            $result = mysqli_query($conn, $sql);
            echo '<form  method="get" class="grid place-content-center mr-[8%] ml-[8%] sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1 mt-[5%]"> ';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $menuId = $row['menuId'];
                    $menuImage = $row['menuImage'];
                    $menuName = $row['menuName'];
                    $menuDescription = $row['menuDescription'];
                    $menuPrice = $row['menuPrice'];

                echo '<div class="menu-item w-[75%] h-70 content-center text-pretty mt-[3%] bg-white border border-gray-200 rounded-lg">
                    <img class="h-30 object-cover mb-2" src="' . $menuImage . '" alt="' . $menuName . '">
                    <p class="text-black text-pretty">' . $menuName . '</p>
                    <p class="text-amber-500 text-sm text-pretty">' . $menuDescription . '</p>
                    <p class="text-black mt-2">' . '฿' . $menuPrice . '.-</p>
                    <button type="submit" onclick="addBasket('.$menuId.',\''. $menuName.'\')" name="order_menu" class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        สั่งอาหาร
                    </button>
                </div>';
                }
            } else {
                echo "0 results";
            }
            echo "</form>";

            // Close connection
            mysqli_close($conn);
        ?>
    
        </div>
        <div class="w-full flex flex-wrap justify-center mb-2 p-10">
            <div id="basket" class="justify-center mt-[-10%]"></div>
        </div>
    </div>
</body>

<script>
    function addBasket(menuId, menuName) {
        var menuQuantity = prompt("กรุณากรอกจำนวนเมนู " + menuName);

        if (menuQuantity !== null && !isNaN(menuQuantity) && menuQuantity > 0) {
            updateSesstionBasket(menuId, menuName, menuQuantity);
            alert("เพิ่ม" + menuQuantity + "จำนวนของเมนู" + menuName + " ลงตะกร้าเรียบร้อย");
        } else {
            alert("กรุณากรอกจำนวนเมนู");
        }
    }

    function updateSesstionBasket(menuId, menuName, menuQuantity) {
        console.log(menuId);
        console.log(menuName);
        console.log(menuQuantity);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateSessionBasket.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim();
                console.log(result);
                location.reload();
            }
        };
        xhr.send('menuId=' + menuId + '&menuName=' + menuName + '&menuQuantity=' + menuQuantity);
    }

</script>

</html>