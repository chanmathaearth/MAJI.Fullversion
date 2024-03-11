<body>
    <div id="mainnavbar">



        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Abel&amp;family=Alegreya+Sans+SC&amp;family=Athiti:wght@500&amp;family=Bai+Jamjuree&amp;family=Bebas+Neue&amp;family=Comfortaa:wght@600&amp;family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&amp;family=Jost:wght@400;600&amp;family=Oswald:wght@200..700&amp;family=Play&amp;family=Poor+Story&amp;family=Prompt:wght@300&amp;family=Protest+Revolution&amp;family=Quicksand&amp;family=Roboto:wght@500&amp;family=Sixtyfour&amp;display=swap" rel="stylesheet">
        <script src="fetchmainNav.js"></script>

        <style>
            body {
                font-family: Prompt, sans-serif;
                font-weight: 300;
                font-style: normal;
            }
        </style>

        <?php
        session_start();

        if (isset($_SESSION['orderId'])) {
            $orderId = $_SESSION['orderId'];
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maji";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        ?>



        <div id="mainnavbar"></div>



    </div>
    <div class="bg-white pr-8 pl-8">
        <div class="grid place-content-center gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
            <div class="col-span-3 sm:col-span-4">
                <div id="blaktomenu" class="hover:text-red-600 ">
                    <a href="fullMenu.php" class="">
                        <span class="flex ">
                            <svg class="justify-center mr-1 ring-1 ring-red-500 rounded-full" height="20px" width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            กลับไปสั่งอาหารเพิ่ม
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-center">

            <div>
                <div class="flex justify-center">
                    <button type="button" onclick="doneOrder(<?php echo $orderId; ?>)" class="text-white bg-red-700 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                        ขอบคุณที่มาใช้บริการ
                    </button>
                </div>
                <section class="w-full ml-[2%] bg-white rounded-md mr-2 sm:py-8 lg:py-8">
                    <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8 mt-10">
                        <div class="flex  items-center">
                            <h1 class="text-black"> ตรวจสอบรายการอาหารที่สั่ง </h1>
                        </div>
                        <div class="mt-[2%]">
                            <div class="flex items-center">
                                <h1 class="text-gray-600 text-sm mt-1"> รายการอาหาร </h1>
                            </div>
                            <div class="items-center text-l text-red-700 grid-col-3">
                                <?php
                                if (isset($_SESSION['orderId'])) {
                                    $orderId = $_SESSION['orderId'];
                                }

                                $orderDetailSQL = "SELECT
                                m.menuName,
                                m.menuImage,
                                od.menuQuantity,
                                m.menuPrice
                            FROM orderdetail od 
                            JOIN menu m ON od.menuId = m.menuId
                            WHERE od.orderId = $orderId";

                                $orderDetailResult = $conn->query($orderDetailSQL);

                                // Check if there are any rows in the result set
                                if ($orderDetailResult->num_rows > 0) {

                                    // Initialize the total amount price outside the loop
                                    $amountPrice = 0;

                                    // Iterate through each row in the result set
                                    while ($orderDetailRow = $orderDetailResult->fetch_assoc()) {
                                        $menuName = $orderDetailRow['menuName'];
                                        $menuImage = $orderDetailRow['menuImage'];
                                        $menuQuantity = $orderDetailRow['menuQuantity'];
                                        $menuPrice = $orderDetailRow['menuPrice'];

                                        echo "<div class='flex mt-5'>
                                            <div class='flex-shrink-0 text-center mt-10'>$menuQuantity</div>
                                            <img src='$menuImage' class='w-28 m-2' alt=''>
                                            <div class='flex-shrink-0 text-sm mt-8'>$menuName <br><br> ฿$menuPrice.-</div>
                                        </div>
                                    <hr>";

                                        // Update the total amount price for each iteration
                                        $amountPrice += $menuPrice * $menuQuantity;
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </section>
                <div class="mt-2">
                    <div class="flex mb-2">
                        <div class="ml-5">ค่าอาหาร</div>
                        <div id="price" class="ml-auto text-center">฿<?php echo number_format($amountPrice, 2); ?></div>
                    </div>

                    <div id="amountMoney" class="flex mb-3">
                        <div class="ml-5">ทั้งหมดราคา</div>
                        <div id="" class="ml-auto text-center">฿<?php echo number_format($amountPrice, 2); ?></div>
                    </div>

                    <div id="discountDiv" class="flex text-red-500 mb-5">*ตรวจสอบรายการอาหารให้ถูกต้อง สามารถเรียกพนักงานได้ทันที</div>

                </div>
            </div>


        </div>
    </div>
    <script>
        function doneOrder(orderId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'doneSession.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.href='index.php';
                }
            };
            xhr.send('orderId=' + orderId);
        }
    </script>
</body>