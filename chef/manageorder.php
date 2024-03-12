<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="fetch.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap"
        rel="stylesheet" />
    <title>ManageOrder</title>
</head>

<?php
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<script>

    function confirm(orderId, menuId, menuStatus) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                console.log(orderId);
                alert("อัพเดตเสร็จสิ้น");
                location.reload();
            }
        };
        xhr.send('orderId=' + orderId + '&menuId=' + menuId + '&menuStatus=' + menuStatus);
    }

    function checkOrder(orderId, deliveryId, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'getMenuStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim(); // Remove leading/trailing whitespaces
                console.log(result);
                callback(result); // Execute the callback function with the result
            }
        };
        xhr.send('orderId=' + orderId + '&deliveryId=' + deliveryId);
    }

    function handleResult(result) {
        if (result === 'true') {
            alert("เมนูทั้งหมดเสร็จสิ้นแล้ว");
            location.reload();
        } else {
            alert("ยังมีเมนูบางรายการที่ยังไม่เสร็จสิ้น");
        }
    }


</script>

<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;">

    <nav>
        <div class="flex justify-center h-[6rem] px-10 shadow items-center ">
            <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                <img src="logo.png" width="130px" height="130px"
                    class="self-center ml-[-20%] mt-[5%] transform hover:scale-105 transition-transform duration-100" />
            </div>
            <div class="flex space-x-7 items-center">
                <a href="../chef/manageorder.php"
                    class="text-red-700 font-medium text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-20">จัดการรายการอาหาร</a>
                <a href="../index.php"
                    class="flex px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                    <svg class="ml-3" fill="#E53B17" height="20px" width="20px" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 384.971 384.971" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g id="Sign_Out">
                                    <path
                                        d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z">
                                    </path>
                                    <path
                                        d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z">
                                    </path>
                                </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </g>
                        </g>
                    </svg>
                </a>
                <!-- <a href="../signup/signup.html"
            class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">โต๊ะอาหาร</a>
            <a href="../signup/signup.html"
            class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ส่งอาหาร</a>
            <a href="../signup/signup.html"
            class="px-4 py-2 rounded text-red-700 font-medium transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ข้อมูล</a> -->
            </div>
        </div>
    </nav>
    <div class="mt-10 ml-10">
        <h1 class="text-3xl font-bold p-3">รายการอาหาร</h1>
    </div>
    <div class="relative overflow-x-auto m-10">
        <div class="grid md:grid-cols-2 gap-10 sm:grid-cols-1">
        <div>
                <table class="w-full text-sm text-left  text-gray-500 text-nowrap">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class=" px-6 py-3">Order ID</th>
                            <th scope="col" class=" px-6 py-3">รับบริการ</th>
                            <th scope="col" class=" px-6 py-3">เวลา</th>
                            <th scope="col" class=" px-6 py-3">สถานะ</th>
                            <th scope="col" class=" px-6 py-3">หมายเหตุ</th>
                            <th scope="col" class=" px-6 py-3">รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ordersSQL = "SELECT orderId, tableId, takeawayId, deliveryId, `description`, orderDateTime, orderStatus, custId FROM orders WHERE orderStatus != 'เสร็จสิ้นออเดอร์' AND DATE(orderDateTime) = CURDATE();
                ";
                        $orderResult = $conn->query($ordersSQL);
                        if ($orderResult->num_rows > 0) {
                            while ($ordersRow = $orderResult->fetch_assoc()) {
                                $orderId = $ordersRow['orderId'];
                                $table = $ordersRow['tableId'];
                                $takeaway = $ordersRow['takeawayId'];
                                $delivery = $ordersRow['deliveryId'];
                                $description = $ordersRow['description'];
                                $orderDateTime = $ordersRow['orderDateTime'];
                                $orderStatus = $ordersRow['orderStatus'];
                                $custId = $ordersRow['custId'];


                                $service = "";
                                if ($table !== null && $delivery === null && $takeaway === null) {
                                    $service = "กินทีั่ร้าน" . $table;
                                    $delivery = 0;
                                } else if ($table === null && $delivery !== null && $takeaway === null) {
                                    $service = "Delivery";
                                } else if ($table === null && $delivery === null && $takeaway !== null) {
                                    $service = "สั่งกลับบ้าน";
                                    $delivery = 0;
                                }


                                if ($description === "") {
                                    $description = "-";
                                }

                                if ($orderStatus === "กำลังสั่งอาหาร") {
                                    continue;
                                }

                                echo "<tr class='bg-white border-b'>";
                                echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>" . $orderId . "</td>";
                                echo "<td class='px-6 py-4'>" . $service . "</td>";
                                echo "<td class='py-4 text-center'>" . substr($orderDateTime, 11, 5) . "</td>";

                                if ($orderStatus == 'ได้รับออเดอร์') {
                                    echo "<td class='text-justify text-yellow-500'>" . "ได้รับออเดอร์" . "</td>";
                                } else if ($orderStatus == 'กำลังปรุงอาหาร') {
                                    echo "<td class='text-justify text-orange-500'>" . "กำลังปรุงอาหาร" . "</td>";
                                } else if ($orderStatus == 'เสร็จสิ้นออเดอร์') {
                                    echo "<td class='text-justify text-green-500'>" . "เสร็จสิ้นออเดอร์" . "</td>";
                                } else if ($orderStatus == 'ยกเลิกออเดอร์') {
                                    echo "<td class='text-justify text-red-500'>" . "ยกเลิกออเดอร์" . "</td>";
                                }

                                echo "<td class='px-6 py-4'>" . $description . "</td>";
                                echo "<td class='text-center' style='width: 150px'>
                        <button data-modal-target='default-modal-$orderId' data-modal-toggle='default-modal-$orderId' class='block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                        ดูรายละเอียด
                        </button>
                            </button>
                          </td>";
                                echo "</tr>";
                                // Modal content
                                echo "<div id='default-modal-$orderId' tabindex='-1' aria-hidden='true' class='hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full'>
                                    <div class='relative p-4 w-full max-w-9xl max-h-full'>
                                        <!-- Modal content -->
                                        <div class='relative bg-white rounded-lg shadow'>
                                            <!-- Modal header -->
                                            <div class='flex items-center justify-between p-2 md:p-5 border-b rounded-t'>
                                                <h3 class='text-xl font-semibold text-gray-900'>
                                                    รายละเอียดคำสั่งซื้อ
                                                </h3>
                                                <button type='button' class='data-modal-hide='default-modal-$orderId' text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center' data-modal-hide='default-modal-$orderId'>
                                                    <svg class='w-3 h-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                                                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                                                    </svg>
                                                    <span class='sr-only'>Close modal</span>
                                                </button>
                                            </div>";
                                echo "<!-- Modal body -->
                        <div class='md:p-5 space-y-4'>
                        <div class='grid grid-cols-4 gap-10 border p-3'>
                        <div class='bg-gray-200 px-5 py-3'>ชื่อ</div>
                        <div class='bg-gray-200 px-5 py-3'>รายละเอียด</div>
                        <div class='bg-gray-200 px-5 py-3  text-center'>สถานะ</div>
                        <div class='bg-gray-200 px-5 py-3 text-center'>อัพเดต</div>";
                                $orderDetailSQL = "SELECT menuId, menuStatus FROM orderDetail WHERE orderId=$orderId";
                                $orderDetailResult = $conn->query($orderDetailSQL);

                                if ($orderDetailResult->num_rows > 0) {
                                    while ($orderDetailRow = $orderDetailResult->fetch_assoc()) {
                                        $menuId = $orderDetailRow['menuId'];
                                        $menuStatus = $orderDetailRow['menuStatus'];

                                        $menuSQL = "SELECT menuName, menuDescription FROM menu WHERE menuId=$menuId";
                                        $menuResult = $conn->query($menuSQL);

                                        if ($menuResult->num_rows > 0) {
                                            $menuRow = $menuResult->fetch_assoc();
                                            $menuName = $menuRow['menuName'];
                                            $menuDescription = $menuRow['menuDescription'];

                                            if ($menuStatus === 'ได้รับเมนู') {
                                                $menuStatusUpdate = 'เริ่มการทำอาหาร';
                                            } else if ($menuStatus === 'กำลังทำเมนู') {
                                                $menuStatusUpdate = 'เสร็จสิ้น';
                                            }



                                            echo "
                                    <div>$menuName</div>
                                    <div>$menuDescription</div>";

                                            if ($menuStatus === 'ได้รับเมนู') {
                                                echo "<div class='text-center text-yellow-500' id='menuStatus'>$menuStatus</div>";
                                            } else if ($menuStatus === 'กำลังทำเมนู') {
                                                echo "<div class='text-center text-red-500 id='menuStatus''>$menuStatus</div>";
                                            } else if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                                echo "<div class='text-center text-green-500 id='menuStatus''>$menuStatus</div>";
                                            }

                                            if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                                echo "<div class='mx-auto'><button class='bg-gray-500 block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                                        </button>
                                    </div>";
                                            } else {
                                                echo "<div class='mx-auto'><button onclick='confirm($orderId, $menuId, \"$menuStatus\") ' id='confirmButton' class='bg-red-500 hover:bg-red-200 block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                                        $menuStatusUpdate</button>
                                    </div>";
                                            }
                                        } else {
                                            echo "Menu not found.";
                                        }
                                    }

                                    echo "</div>
                                </div>";
                                }



                                echo "<!-- Modal footer -->
                        <div>
                          <div class='flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b'>
                                <button data-modal-hide='default-modal-$orderId' onclick='checkOrder($orderId, $delivery, handleResult)' type='button' class='text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center'>เสร็จสิ้นออเดอร์</button>
                            </div>
                        </div>
                ";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-nowrap">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-left">
                        <tr>
                            <th scope="col" class="px-6 py-3">Order ID</th>
                            <th scope="col" class="px-6 py-3">รับบริการ</th>
                            <th scope="col" class="px-6 py-3">เวลา</th>
                            <th scope="col" class="px-6 py-3">สถานะ</th>
                            <th scope="col" class="px-6 py-3">หมายเหตุ</th>
                            <th scope="col" class="px-6 py-3">รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ordersSQL = "SELECT orderId, tableId, takeawayId, deliveryId, `description`, orderDateTime, orderStatus, custId FROM orders WHERE orderStatus = 'เสร็จสิ้นออเดอร์' AND DATE(orderDateTime) = CURDATE();
                ";
                        $orderResult = $conn->query($ordersSQL);
                        if ($orderResult->num_rows > 0) {
                            while ($ordersRow = $orderResult->fetch_assoc()) {
                                $orderId = $ordersRow['orderId'];
                                $table = $ordersRow['tableId'];
                                $takeaway = $ordersRow['takeawayId'];
                                $delivery = $ordersRow['deliveryId'];
                                $description = $ordersRow['description'];
                                $orderDateTime = $ordersRow['orderDateTime'];
                                $orderStatus = $ordersRow['orderStatus'];
                                $custId = $ordersRow['custId'];


                                $service = "";
                                if ($table !== null && $delivery === null && $takeaway === null) {
                                    $service = "กินทีั่ร้าน" . $table;
                                    $delivery = 0;
                                } else if ($table === null && $delivery !== null && $takeaway === null) {
                                    $service = "Delivery";
                                } else if ($table === null && $delivery === null && $takeaway !== null) {
                                    $service = "สั่งกลับบ้าน";
                                    $delivery = 0;
                                }


                                if ($description === "") {
                                    $description = "-";
                                }

                                if ($orderStatus === "กำลังสั่งอาหาร") {
                                    continue;
                                }

                                echo "<tr class='bg-white border-b'>";
                                echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>" . $orderId . "</td>";
                                echo "<td class='px-6 py-4'>" . $service . "</td>";
                                echo "<td class='py-4 text-center'>" . substr($orderDateTime, 11, 5) . "</td>";

                                if ($orderStatus == 'ได้รับออเดอร์') {
                                    echo "<td class='text-justify text-yellow-500'>" . "ได้รับออเดอร์" . "</td>";
                                } else if ($orderStatus == 'กำลังปรุงอาหาร') {
                                    echo "<td class='text-justify text-orange-500'>" . "กำลังปรุงอาหาร" . "</td>";
                                } else if ($orderStatus == 'เสร็จสิ้นออเดอร์') {
                                    echo "<td class='text-justify text-green-500'>" . "เสร็จสิ้นออเดอร์" . "</td>";
                                } else if ($orderStatus == 'ยกเลิกออเดอร์') {
                                    echo "<td class='text-justify text-red-500'>" . "ยกเลิกออเดอร์" . "</td>";
                                }

                                echo "<td class='px-6 py-4'>" . $description . "</td>";
                                echo "<td class='text-center' style='width: 150px'>
                        <button data-modal-target='default-modal-$orderId' data-modal-toggle='default-modal-$orderId' class='block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                        ดูรายละเอียด
                        </button>
                            </button>
                          </td>";
                                echo "</tr>";
                                // Modal content
                                echo "<div id='default-modal-$orderId' tabindex='-1' aria-hidden='true' class='hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full'>
                                    <div class='relative p-4 w-full max-w-9xl max-h-full'>
                                        <!-- Modal content -->
                                        <div class='relative bg-white rounded-lg shadow'>
                                            <!-- Modal header -->
                                            <div class='flex items-center justify-between p-2 md:p-5 border-b rounded-t'>
                                                <h3 class='text-xl font-semibold text-gray-900'>
                                                    รายละเอียดคำสั่งซื้อ
                                                </h3>
                                                <button type='button' class='data-modal-hide='default-modal-$orderId' text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center' data-modal-hide='default-modal-$orderId'>
                                                    <svg class='w-3 h-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                                                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                                                    </svg>
                                                    <span class='sr-only'>Close modal</span>
                                                </button>
                                            </div>";
                                echo "<!-- Modal body -->
                        <div class='md:p-5 space-y-4'>
                        <div class='grid grid-cols-4 gap-10 border p-3'>
                        <div class='bg-gray-200 px-5 py-3'>ชื่อ</div>
                        <div class='bg-gray-200 px-5 py-3'>รายละเอียด</div>
                        <div class='bg-gray-200 px-5 py-3  text-center'>สถานะ</div>
                        <div class='bg-gray-200 px-5 py-3 text-center'>อัพเดต</div>";
                                $orderDetailSQL = "SELECT menuId, menuStatus FROM orderDetail WHERE orderId=$orderId";
                                $orderDetailResult = $conn->query($orderDetailSQL);

                                if ($orderDetailResult->num_rows > 0) {
                                    while ($orderDetailRow = $orderDetailResult->fetch_assoc()) {
                                        $menuId = $orderDetailRow['menuId'];
                                        $menuStatus = $orderDetailRow['menuStatus'];

                                        $menuSQL = "SELECT menuName, menuDescription FROM menu WHERE menuId=$menuId";
                                        $menuResult = $conn->query($menuSQL);

                                        if ($menuResult->num_rows > 0) {
                                            $menuRow = $menuResult->fetch_assoc();
                                            $menuName = $menuRow['menuName'];
                                            $menuDescription = $menuRow['menuDescription'];

                                            if ($menuStatus === 'ได้รับเมนู') {
                                                $menuStatusUpdate = 'เริ่มการทำอาหาร';
                                            } else if ($menuStatus === 'กำลังทำเมนู') {
                                                $menuStatusUpdate = 'เสร็จสิ้น';
                                            }



                                            echo "
                                    <div>$menuName</div>
                                    <div>$menuDescription</div>";

                                            if ($menuStatus === 'ได้รับเมนู') {
                                                echo "<div class='text-center text-yellow-500' id='menuStatus'>$menuStatus</div>";
                                            } else if ($menuStatus === 'กำลังทำเมนู') {
                                                echo "<div class='text-center text-red-500 id='menuStatus''>$menuStatus</div>";
                                            } else if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                                echo "<div class='text-center text-green-500 id='menuStatus''>$menuStatus</div>";
                                            }

                                            if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                                echo "<div class='mx-auto'><button class='bg-gray-500 block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                                        </button>
                                    </div>";
                                            } else {
                                                echo "<div class='mx-auto'><button onclick='confirm($orderId, $menuId, \"$menuStatus\") ' id='confirmButton' class='bg-red-500 hover:bg-red-200 block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                                        $menuStatusUpdate</button>
                                    </div>";
                                            }
                                        } else {
                                            echo "Menu not found.";
                                        }
                                    }

                                    echo "</div>
                                </div>";
                                }



                                echo "<!-- Modal footer -->
                        <div>
                          <div class='flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b'>
                                <button data-modal-hide='default-modal-$orderId' onclick='checkOrder($orderId, $delivery, handleResult)' type='button' class='text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center'>เสร็จสิ้นออเดอร์</button>
                            </div>
                        </div>
                ";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>