<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maji";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tableName = $_GET['tableName'];

    $orderIdSQL = "SELECT o.orderId 
                FROM tabletype t JOIN orders o ON t.tableTypeId = o.tableId
                WHERE o.tableId = '$tableName' AND t.tableTypeStatus = 'ไม่ว่าง' AND o.orderStatus != 'เสร็จสิ้นออเดอร์' AND o.orderStatus != 'ยกเลิกออเดอร์' 
                ORDER BY o.orderDateTime DESC LIMIT 1";
    $orderIdResult = $conn->query($orderIdSQL);

    if ($orderIdResult) {
        $row = $orderIdResult->fetch_assoc();
        $orderId = $row['orderId'];
    }
    ?>

    <div>
        <p class='text-center text-xl'>โต๊ะที่ :<?php echo "$tableName"; ?></p><br>
        <p class='text-center text-xl'>เลขออเดอร์ที่ :<?php echo "$orderId"; ?></p><br>

        <div>
            <table class='w-full text-left '>
                <thead class='text-l bg-gray-200'>
                    <tr>
                        <th scope='col' class='px-6 py-3'>
                            เมนู
                        </th>
                        <th scope='col' class='px-6 py-3'>
                            จำนวน
                        </th>
                        <th scope='col' class='px-6 py-3'>
                            ราคา
                        </th>
                        <th scope='col' class='px-6 py-3'>
                            สถานะ
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $orderDetail = "SELECT od.menuId, od.menuQuantity, od.menuStatus, m.menuName, m.menuPrice 
                        FROM orders o LEFT JOIN orderdetail od ON o.orderId = od.orderId LEFT JOIN menu m ON od.menuId = m.menuId 
                        WHERE od.orderId = $orderId";

                    $orderDetailResult = $conn->query($orderDetail);
                    if ($orderDetailResult->num_rows > 0) {
                        $amountMoney = 0;
                        while ($ordersRow = $orderDetailResult->fetch_assoc()) {
                            $menuId = $ordersRow['menuId'];
                            $menuQuantity = $ordersRow['menuQuantity'];
                            $menuStatus = $ordersRow['menuStatus'];
                            $menuName = $ordersRow['menuName'];
                            $menuPrice = $ordersRow['menuPrice'];

                            echo "<tr class='bg-gray-50 border-b hover:bg-gray-100'>";
                            echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>$menuName</th>
                                <td class='px-6 py-4'>$menuQuantity</td>
                                <td class='px-6 py-4'>$menuPrice</td>";

                            if ($menuStatus === 'ได้รับเมนู') {
                                echo "<td class='px-6 py-4 text-yellow-500'>$menuStatus</td>";
                            } else if ($menuStatus === 'กำลังทำเมนู') {
                                echo "<td class='px-6 py-4 text-orage-400'>$menuStatus</td>";
                            } else if ($menuStatus === 'เสร็จสิ้นเมนู') {
                                echo "<td class='px-6 py-4 text-green-400'>$menuStatus</td>";
                            } else if ($menuStatus === 'ยกเลิกเมนู') {
                                echo "<td class='px-6 py-4 text-red-400'>$menuStatus</td>";
                            }
                            $amountMoney += $menuPrice;
                        }
                    }



                    ?>

                </tbody>


                <div class="flex justify-center">
                    <button onclick="openModal()" class="rounded-full text-center bg-red-500 text-white p-2 mb-4">Show</button>
                    <select id="payment-method" name="payment-method" class="block p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 sm:text-sm" fdprocessedid="nfx81n">
                        <option value="">เลือกวิธีชำระเงิน</option>
                        <option value="เงินสด">เงินสด</option>
                        <option value="โอนชำระ">โอนชำระ</option>
                    </select>
                    <button type="button" onclick="payment('<?php echo $tableName; ?>', <?php echo $orderId; ?>, <?php echo $amountMoney; ?>)" class="rounded-full text-center bg-green-500 text-white p-2 mb-4 ml-4">ชำระเงิน</button>
                </div>


                <?php
                // Close connection
                $conn->close();

                ?>

</body>


</html>