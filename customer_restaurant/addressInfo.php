<body>
    <div id="mainnavbar">



        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Abel&amp;family=Alegreya+Sans+SC&amp;family=Athiti:wght@500&amp;family=Bai+Jamjuree&amp;family=Bebas+Neue&amp;family=Comfortaa:wght@600&amp;family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&amp;family=Jost:wght@400;600&amp;family=Oswald:wght@200..700&amp;family=Play&amp;family=Poor+Story&amp;family=Prompt:wght@300&amp;family=Protest+Revolution&amp;family=Quicksand&amp;family=Roboto:wght@500&amp;family=Sixtyfour&amp;display=swap" rel="stylesheet">
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



        <nav>
            <div class="flex justify-center h-[6rem] px-10 shadow items-center ">
                <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                    <img src="logo.png" width="130px" height="130px" class="self-center ml-[-20%] mt-[5%] transform hover:scale-105 transition-transform duration-100">
                </div>
                <div class="flex space-x-4 items-center">
                    <a class="text-red-700 font-medium text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">หน้าหลัก</a>
                    <a href="promotion.php" class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">เมนู</a>
                    <a class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">โต๊ะอาหาร</a>
                    <a class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ส่งอาหาร</a>
                    <a class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ข้อมูล</a>
                    <a href="manageRes.html" class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">จัดการร้านอาหาร</a>
                </div>
            </div>
        </nav>

        <script src="script.js"></script>


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
                <section class="w-full mb-[2%] ml-[2%] bg-white rounded-md mr-2 sm:py-8 lg:py-8">
                    <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8 mt-10">
                        <div class="flex  items-center mt-[3%]">
                            <h1 class="text-black"> ตรวจสอบรายการอาหารที่สั่ง </h1>
                        </div>
                        <div class="mt-[2%]">
                            <div class="flex items-center">
                                <h1 class="text-gray-600 text-sm mt-1"> รายการอาหาร </h1>
                            </div>
                            <div class="items-center text-l text-red-700 grid-col-3">
                                <?php
                                if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

                                    $amountPrice = 0;

                                    foreach ($_SESSION['basket'] as $index => $item) {
                                        $menuId = $item['menuId'];
                                        $menuName = $item['menuName'];
                                        $menuQuantity = $item['menuQuantity'];

                                        $menuSQL = "SELECT
                                            menuImage,
                                            menuPrice
                                            FROM menu WHERE menuId = $menuId
                                    ";
                                        $menuResult = $conn->query($menuSQL);
                                        if ($menuResult->num_rows > 0) {

                                            $menuRow = $menuResult->fetch_assoc();
                                            $menuImage = $menuRow['menuImage'];
                                            $menuPrice = $menuRow['menuPrice'];


                                            echo "<div class='flex mt-5'>
                                        <div class='flex-shrink-0 text-center mt-10'>$menuQuantity</div>
                                            <img src='$menuImage' class='w-28 m-2' alt=''>
                                            <div class='flex-shrink-0 text-sm mt-8'>$menuName <br><br> ฿$menuPrice.-</div>
                                            </div>
                                            <hr>
                                            ";
                                        }

                                        $amountPrice += $menuPrice*$menuQuantity;
                                    }
                                }
                                ?>


                            </div>

                        <div class="grid-cols-1 items-center">
                            <button type="button" onclick="table(<?php echo $orderId; ?>)" class="mt-5 mb-[2%] text-white bg-red-700 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                ยืนยันการสั่งซื้อ
                            </button>
                        </div>
                    </div>
            </div>
            </section>
        </div>

        <script>
            function table(orderId) {
                console.log(orderId);
                var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'updateOrderTable.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(xhr.responseText);
                            alert("คำสั่งซื้อเรียบร้อย");
                            window.location.href = 'fullMenu.php';
                        }
                    };

                    // แก้ไขรูปแบบของข้อมูลที่ส่ง
                    var data = 'orderId=' + orderId;
                    xhr.send(data);
            }
        </script>


    </div>
    </div>

    <div id="qd_reminder_popup" class="hide">
        <div class="qd-reminder-container">
            <div class="qd-reminder-content-wrapper">
                <div class="qd-reminder-content">
                    <div class="qd-reminder-orig"></div>
                    <div class="qd-reminder-mean"></div>
                </div>
            </div>
        </div>
        <div class="qd-close"></div>
    </div>
</body>