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
                    <th scope="col" class="px-6 py-3">ลำดับที่</th>
                    <th scope="col" class="px-6 py-3">ชื่อเมนู</th>
                    <th scope="col" class="px-6 py-3">จำนวน</th>
                    <th scope="col" class="px-6 py-3">ราคา</th>
                    <th scope="col" class="px-6 py-3">สถานะ</th>
                    <th scope="col" class="px-6 py-3">ยกเลิก</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                // session_start();
                // if (isset($_SESSION['orderId'])) {
                //     $orderId = $_SESSION['orderId'];

                //สมมติ orderId มา เพราะจริงๆต้องใช้ session

                $ordersSQL = "SELECT o.orderId,
                                    od.menuId,
                                    od.menuQuantity,
                                    od.menuStatus, 
                                    m.menuName, 
                                    m.menuPrice
                                    FROM orders o LEFT JOIN orderdetail od on o.orderId = od.orderId LEFT JOIN menu m ON od.menuId = m.menuId 
                                    WHERE o.tableId IS NOT NULL && o.orderId = 1
                                    ";
                $ordersResult = $conn->query($ordersSQL);
                if ($ordersResult->num_rows > 0) {

                    $i = 0;

                    while ($ordersRow = $ordersResult->fetch_assoc()) {
                        $orderId = $ordersRow['orderId'];

                        //table orderDetail
                        $menuId = $ordersRow['menuId'];
                        $menuQuantity = $ordersRow['menuQuantity'];
                        $menuStatus = $ordersRow['menuStatus'];


                        //table menu
                        $menuName = $ordersRow['menuName'];
                        $menuPrice = $ordersRow['menuPrice'];

                        $i++;


                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                        echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $i . "</td>";
                        echo "<td class='px-6 py-4'>" . $menuName . "</td>";
                        echo "<td class='px-6 py-4'>" . $menuQuantity . "</td>";
                        echo "<td class='px-6 py-4'> ฿" . number_format($menuPrice, 2) . "</td>";

                        if ($menuStatus === 'ได้รับเมนู') {
                            echo "<td class='text-yellow-400'>" . "ได้รับเมนู" . "</td>";
                            echo "<td class='px-6 py-4'>
                                <button class='mx-auto block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' type='button' onclick='confirmCancellation($orderId, $menuId, \"$menuName\")'>
                                    ยกเลิกเมนู
                                </button>
                            </td>";

                        } else {
                            if ($menuStatus === 'กำลังทำเมนู') {
                                echo "<td class='text-orange-400'>" . "กำลังทำเมนู" . "</td>";
                            } else if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                echo "<td class='text-green-500'>" . "เสร็จสิ้นเมนู" . "</td>";
                            } else if ($menuStatus === 'ยกเลิกเมนู') {
                                echo "<td class='text-red-600'>" . "ยกเลิกเมนู" . "</td>";
                        }
                        echo "<td class='text-gray-500 text-xl'>-</td>";
                    }

                        echo "</tr>";
                    }
                }

                 else {
                    echo "<p class='text-xl hover:text-red-600 text-center mb-10 text-red-400'>ไม่มีประวัติการสั่งซื้อ</p>";
                }
                ?>
            </tbody>
    </div>
</body>

<script>
    function confirmCancellation(orderId, menuId, menuName) {
      var confirmation = confirm("ยืนยันการยกเลิกเมนู " + menuName + " หรือไม่?");

      // Check user's response
      if (confirmation) {
        cancelMenu(orderId, menuId);
        alert("เมนู " + menuName + " ถูกยกเลิกเรียบร้อยแล้ว");
        // Add your logic to handle the cancellation
      } else {
        // User clicked "Cancel," do nothing or provide feedback
        alert("ยกเลิกการยกเลิกคำสั่งซื้อ");
      }
    }

    function cancelMenu(orderId, menuId) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'cancelMenu.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            console.log(xhr.responseText);
            window.location.href = 'orderHistoryTable.php';

          } else {
            console.error('Error: ' + xhr.status);
          }
        }
      };
      xhr.send('orderId=' + orderId + '&menuId=' + menuId);
    }

</script>

</html>