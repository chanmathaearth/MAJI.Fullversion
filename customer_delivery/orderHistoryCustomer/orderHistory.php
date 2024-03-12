<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
    <title>delivery</title>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            width: 50%;
            position: absolute;
            min-height: 300px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border-radius: 8px;
            background-color: white;
        }

        .modal-body {
            margin-top: 20px;
            min-height: 250px;
        }

        .modal-footer {
            display: flex;
            margin-top: 20px;
        }
    </style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<body>
    <script>
        function openModal(modalID) {
            console.log("asd");
        }

        function closeModal(modalID) {
            document.getElementById(modalID).style.display = 'none';
        }
    </script>

    <div id="navbar"></div>
    <div>
        <h1 class="text-3xl font-bold m-10">ประวัติการสั่งซื้อ
        </h1>
    </div>
    <div class="relative overflow-x-auto m-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Order ID</th>
                    <th scope="col" class="px-6 py-3">บริการ</th>
                    <th scope="col" class="px-6 py-3">เวลา</th>
                    <th scope="col" class="px-6 py-3">ราคา</th>
                    <th scope="col" class="px-6 py-3">สถานะ</th>
                    <th scope="col" class="px-6 py-3">หมายเหตุ</th>
                    <th scope="col" class="px-6 py-3">รายละเอียด</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                // session_start();
                // if (isset($_SESSION['accountId'])) {
                //     $accountId = $_SESSION['accountId'];
                
//สมมติ accountId มา เพราะจริงๆต้องใช้ session

                    $customerSQL = "SELECT custId FROM customer WHERE accountId = 2";
                    $customerResult = $conn->query($customerSQL);

                    if ($customerResult->num_rows > 0) {

                        $customerData = $customerResult->fetch_assoc();

                        $custId = $customerData['custId'];

                        $ordersSQL = "SELECT o.orderId,
                                    o.deliveryId,
                                    o.takeawayId, 
                                    o.description, 
                                    o.orderDateTime,
                                    o.orderStatus, 
                                    p.amountMoney, 
                                    d.deliveryStatus 
                                    FROM orders o LEFT JOIN payment p ON o.orderId = p.orderId LEFT JOIN delivery d ON o.deliveryId = d.deliveryId LEFT JOIN takeaway t ON o.takeawayId = t.takeawayId 
                                    WHERE custId = $custId
                                    ORDER BY o.orderDateTime DESC;
                                    ";
                        $ordersResult = $conn->query($ordersSQL);
                        if ($ordersResult->num_rows > 0) {

                            while ($ordersRow = $ordersResult->fetch_assoc()) {
                                $orderId = $ordersRow['orderId'];
                                $deliveryId = $ordersRow['deliveryId'];
                                $takeawayId = $ordersRow['takeawayId'];

                                //table orders
                                $description = $ordersRow['description'];
                                $orderDateTime = $ordersRow['orderDateTime'];
                                $orderStatus = $ordersRow['orderStatus'];

                                //table payment
                                $amountMoney = $ordersRow['amountMoney'];

                                //table delivery
                                $deliveryStatus = $ordersRow['deliveryStatus'];

                                if ($deliveryId !== null) {
                                    $service = 'Delivery';
                                } else if ($takeawayId !== null) {
                                    $service = 'สั่งกลับบ้าน';
                                }


                                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                                echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $orderId . "</td>";
                                echo "<td class='px-6 py-4'>" . $service . "</td>";
                                echo "<td class='px-6 py-4'>" . date('d-M-Y H:i:s', strtotime($orderDateTime)) . "</td>";
                                echo "<td class='px-6 py-4'> ฿" . number_format($amountMoney, 2) . "</td>";
                                if ($deliveryStatus === 'กำลังจัดการออเดอร์') {
                                    echo "<td class='text-yellow-500'>" . "กำลังจัดการออเดอร์" . "</td>";
                                } else if ($deliveryStatus === 'กำลังจัดส่ง') {
                                    echo "<td class='text-orange-500'>" . "กำลังจัดส่ง" . "</td>";
                                } else if ($deliveryStatus === 'จัดส่งเสร็จสิ้น') {
                                    echo "<td class='text-green-500'>" . "จัดส่งเสร็จสิ้น" . "</td>";
                                } else if ($orderStatus == 'ได้รับออเดอร์') {
                                    echo "<td class='text-yellow-500'>" . "ได้รับออเดอร์" . "</td>";
                                } else if ($orderStatus == 'กำลังปรุงอาหาร') {
                                    echo "<td class='text-orange-500'>" . "กำลังปรุงอาหาร" . "</td>";
                                } else if ($orderStatus == 'เสร็จสิ้นออเดอร์') {
                                    echo "<td class='text-green-500'>" . "เสร็จสิ้นออเดอร์" . "</td>";
                                } else if ($orderStatus == 'ยกเลิกออเดอร์') {
                                    echo "<td class='text-red-500'>" . "ยกเลิกออเดอร์" . "</td>";
                                }

                                if ($description === '') {
                                    $description = '-';
                                }

                                echo "<td class='px-6 py-4'>" . $description . "</td>";


                                if ($orderStatus === 'ได้รับออเดอร์') {
                                    $pageOrderDetail = "history_process.php?orderId=$orderId";
                                } else {
                                    $pageOrderDetail = "history_done.php?orderId=$orderId";
                                }

                                echo "<td class='px-6 py-4'>
          <button class='mx-auto block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' type='button'
        onclick=\"window.location.href = '$pageOrderDetail'\">
        ดูรายละเอียด
        </button>


      
                </td>";
                                echo "</tr>";
                            }
                        }
                    }
                // } else {
                //     echo "<p class='text-xl hover:text-red-600 text-center mb-10 text-red-400'>ไม่มีประวัติการสั่งซื้อ</p>";
                // }
                ?>
            </tbody>
    </div>
</body>

</html>