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
$username = "g23japaneseres";
$password = "4401MPW561A";
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
      <nav>
        <div class="flex justify-center h-[6rem] px-10 shadow items-center text-nowrap">
            <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse">
                <img src="logo.png" width="130px" height="130px"
                    class="self-center ml-[-20%] mt-[5%] transform hover:scale-105 transition-transform duration-100" />
            </div>
            <div class="flex space-x-4 items-center">
			<a href="../manageres/manageres.html"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">จัดการร้านอาหาร</a>
                <a href="../tablehandle/table.php"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">โต๊ะอาหาร</a>
					<a href="../manageDelivery/manageDelivery.php"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ส่งอาหาร</a>
                <a href="../dashboard/index.php"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ข้อมูล</a>
					<a href="../employee_menu/menuPage.php"
				class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">เมนู</a>
        <a href="../../index.php"
            class="flex px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
            <svg class="ml-3" fill="#E53B17"  height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
            </a>
            </div>
        </div>
    </nav>
  <div>
    <h1 class="text-3xl font-bold m-10  text-amber-800">จัดส่งอาหาร</h1>
  </div>
  <div class="relative overflow-x-auto m-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">Order ID</th>
          <th scope="col" class="px-6 py-3">เวลา</th>
          <th scope="col" class="px-6 py-3">ราคา</th>
          <th scope="col" class="px-6 py-3">สถานะ</th>
          <th scope="col" class="px-6 py-3">หมายเหตุ</th>
          <th scope="col" class="px-6 py-3">รายละเอียด</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
                                    $ordersDeliverySQL = "SELECT o.orderId, 
                                    o.description, 
                                    o.orderDateTime, 
                                    p.amountMoney, 
                                    d.deliveryStatus 
                                    FROM orders o LEFT JOIN payment p ON o.orderId = p.orderId LEFT JOIN delivery d ON o.deliveryId = d.deliveryId 
                                    WHERE o.deliveryId IS NOT NULL 
                                    ORDER BY o.orderDateTime DESC;
                                    ";
                                    $ordersDeliveryResult = $conn->query($ordersDeliverySQL);
                                    if ($ordersDeliveryResult->num_rows > 0) {

                                        while ($ordersDetailRow = $ordersDeliveryResult->fetch_assoc()) 
                                        {
                                            $orderId = $ordersDetailRow['orderId']; 

                                            //table orders
                                            $description = $ordersDetailRow['description'];
                                            $orderDateTime = $ordersDetailRow['orderDateTime']; 
                                            
                                            //table payment
                                            $amountMoney = $ordersDetailRow['amountMoney'];
                                             
                                            //table delivery
                                            $deliveryStatus = $ordersDetailRow['deliveryStatus'];
                                            

          echo "<tr class='bg-white border-b'>";
          echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap '>" . $orderId . "</td>";
          echo "<td class='px-6 py-4'>" . date('d-M-Y H:i:s', strtotime($orderDateTime)) . "</td>";
          echo "<td class='px-6 py-4'>" . number_format($amountMoney, 2) . "</td>";
          if ($deliveryStatus === 'กำลังจัดการออเดอร์') {
            echo "<td class='text-yellow-500'>" . "กำลังจัดการออเดอร์" . "</td>";
          } else if ($deliveryStatus === 'กำลังจัดส่ง') {
            echo "<td class='text-orange-500'>" . "กำลังจัดส่ง" . "</td>";
          } else if ($deliveryStatus === 'จัดส่งเสร็จสิ้น') {
            echo "<td class='text-green-500'>" . "จัดส่งเสร็จสิ้น" . "</td>";
          }

          if ($description === '') {
            $description = '-';
          }
          echo "<td class='text-center style='width: 150px>" . $description . "</td>";


          if ($deliveryStatus === 'จัดส่งเสร็จสิ้น') {
            $pageOrderDetail = "detail_delivery_done.php?orderId=$orderId";
          } else {
            $pageOrderDetail = "detail_delivery_process.php?orderId=$orderId";
          }

          echo "<td class='px-6 py-4'>
          <button class='mx-auto block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'
        onclick=\"window.location.href = '$pageOrderDetail'\">
        ดูรายละเอียด
        </button>


      
                </td>";
          echo "</tr>";

        }
    }
        ?>
      </tbody>
  </div>
</body>

</html>
