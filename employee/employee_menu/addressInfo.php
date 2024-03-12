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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maji";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <script src="script.js"></script>


    </div>
    <div class="bg-white pr-8 pl-8">
        <div class="grid place-content-center gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
            <div class="col-span-3 sm:col-span-4">
                <div id="blaktomenu" class="hover:text-red-600 ">
                    <a href="menuPage.php?menuTypeId=6" class="">
                    <a href="menuPage.php">
                        <span class="flex">
                        <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                        </svg>
                            </span>
                        </a>
                    </a>
                </div>
            </div>
        </div>
        <div class="ml-[20%] mr-[20%]">
            <div class="flex justify-center">
                <section class="w-full mb-[2%] ml-[2%] bg-white rounded-md mr-2 sm:py-8 lg:py-8">
                    <div>
                    <div class="w-full p-5 rounded-full">
                        <div>
                            <div class="justify-center w-full p-4">
                                <label for="orderType" class="text-sm font-medium text-gray-600">เลือกประเภทการสั่ง</label>
                                <select id="orderType" name="orderType" class="mt-1 block w- p-2 border border-gray-300 rounded-md w-[100%] bg-white">
                                    <option value="takeaway">สั่งกลับบ้าน</option>
                                    <option value="table">ทานที่ร้าน</option>
                                </select>

                                <p class="mt-4">เลือก: <span id="selected">สั่งกลับบ้าน</span></p>
                                <div id="tableID"></div>
                            </div>
                        </div>

                    </div>


                    <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8 mt-2 w-[110%]">
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
                            <div id="check">

                                <div class="container mx-auto p-4">
                                    <label for="customer" class="block text-sm font-medium text-gray-600">บัตรสมาชิก</label>
                                    <select id="customer" name="orderType" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-red-500 bg-white">
                                        <option value="customer">บุคคลทั่วไป</option>
                                        <option value="special">สมาชิก</option>
                                    </select>

                                    <p class="mt-4">เลือก: <span id="select"> บุคคลทั่วไป </span></p>
                                    <div id="display" class="text-red-700"></div>
                                    <div id="customerId" class="text-red-700"></div>
                                </div>
                                <div class="between mt-5">
                                    <div class="flex mb-2">
                                        <div class="ml-5">ค่าอาหาร</div>
                                        <div id="price" class="ml-auto text-center">฿<?php echo number_format($amountPrice, 2); ?></div>
                                    </div>
                                    <div id="discountDiv" class="flex text-red-500 mb-2"></div>

                                    <div id="amountMoney" class="flex mb-2">
                                        <div class="ml-5">ทั้งหมด</div>
                                        <div id="" class="ml-auto text-center">฿<?php echo number_format($amountPrice, 2); ?></div>
                                    </div>

                                    <div id="amountDiscount" class="flex mb-2">

                                    </div>
                                </div>

                                <hr>

                                <div class="mt-5 mb-3">
                                    <label for="payment-method" class="block text-sm font-medium text-black-700">วิธีการชำระเงิน :</label>
                                    <select id="payment-method" name="payment-method" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 sm:text-sm">
                                        <option value="">เลือกวิธีชำระเงิน</option>
                                        <option value="เงินสด">เงินสด</option>
                                        <option value="โอนชำระ">โอนชำระ</option>
                                    </select>
                                    <div id="qrcode" class="text-center"></div>

                                </div>


                            </div>
                            <script>
                                const orderId = document.getElementById('orderType');
                                const selected = document.getElementById('selected');
                                const tableID = document.getElementById('tableID');

                                const check = document.getElementById('check');

                                orderId.addEventListener('change', function() {
                                    const selectedValue = orderId.value;

                                    if (selectedValue == "table") {
                                        tableID.innerHTML = "<input type='text' id='tableTypeId' class='w-full p-2 mt-1 border border-gray-300 rounded-md ' placeholder='ใส่เลขโต๊ะ' >";
                                        selected.textContent = 'ทานที่ร้าน';
                                        if (check) {
                                            check.innerHTML = "";
                                        }
                                    } else if (selectedValue == "takeaway") {
                                        tableID.innerHTML = "";
                                        selected.textContent = 'สั่งกลับบ้าน';
                                        location.reload();
                                    }
                                });


                                const customer = document.getElementById('customer');
                                const select = document.getElementById('select');
                                const display = document.getElementById('display');
                                const customerId = document.getElementById('customerId');
                                const price = parseFloat(document.getElementById('price').textContent.replace('฿', '').replace('.-', ''));

                                const discountDiv = document.getElementById('discountDiv');
                                const discount = parseFloat(price) * 0.10;

                                const amountMoney = document.getElementById('amountMoney');
                                const amountDiscount = document.getElementById('amountDiscount');
                                const amountPrice = parseFloat(price - discount);

                                customer.addEventListener('change', function() {
                                    select.textContent = customer.value === 'customer' ? 'บุคคลทั่วไป' : 'สมาชิก';
                                    if (select.textContent == 'สมาชิก') {
                                        display.innerHTML = "ลูกค้าแสดงบัตรสมาชิก";
                                        customerId.innerHTML = "<input id='custId' type='text' class='p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-red-500 ' placeholder='ใส่เลขสมาชิก' >";
                                        discountDiv.innerHTML = `<div class="ml-5">ส่วนลด</div>`;
                                        discountDiv.innerHTML += `<div id="discount" class="ml-auto text-center">-฿${discount.toFixed(2)}</div>`;

                                        amountDiscount.innerHTML = `<div class="ml-5">ทั้งหมด</div>`;
                                        amountDiscount.innerHTML += `<div id="" class="ml-auto text-center">฿${amountPrice.toFixed(2)}</div>`;
                                        amountMoney.innerHTML = "";
                                    } else {
                                        display.innerHTML = " "
                                        customerId.innerHTML = " "
                                        discountDiv.innerHTML = "";
                                        amountMoney.innerHTML = `<div class="ml-5">ทั้งหมด</div>`;
                                        amountMoney.innerHTML += `<div id="" class="ml-auto text-center">฿${price.toFixed(2)}</div>`;
                                        amountDiscount.innerHTML = "";
                                    }
                                });
                            </script>
                        </div>

                        <div class="grid-cols-1  mt-2">
                            <button type="button" onclick="orderConfirm()" class="flex justify-center mt-4 mb-[2%] text-white bg-red-700 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                ยืนยันการสั่งซื้อ
                            </button>
                            <div class="text-sm text-red-600">* สมาชิกรับส่วนลด 10%</div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

        <script>
            function orderConfirm() {

                let selected = document.getElementById('selected').textContent; //สั่งกลับบ้าน, ทานที่ร้าน 
                let tableId;
                let customerIdValue;
                let paymentMethod;
                let amountMoney;


                if (selected == 'ทานที่ร้าน') {
                    tableId = document.getElementById('tableTypeId').value; //เลขโต๊ะ
                    if (tableId == '') {
                        alert('กรุณากรอกเลขโต๊ะ');
                        return false;
                    }
                } else {
                    const customer = document.getElementById('select').textContent; // บุคคลทั่วไป ,  สมาชิก

                    if (customer == 'สมาชิก') {
                        const custId = document.getElementById('custId');
                        customerIdValue = custId.value.trim(); // trim() removes leading and trailing whitespaces

                        if (customerIdValue === '') {
                            alert('กรุณากรอกเลขสมาชิก');
                            return false;
                        } else {
                            console.log('Customer ID:', customerIdValue);
                        }
                        amountMoney = amountPrice; // const amountPrice มีแล้วข้างบน คือค่าทั้งหมด ถ้ามีส่วนลด

                    } else {
                        customerIdValue = 0; // Assign a value to customerIdValue
                        amountMoney = price; // const price มีแล้วข้างบน คือค่าอาหารทั้งหมด ถ้าไม่มีส่วนลด
                    }

                    paymentMethod = document.getElementById('payment-method').value;

                    if (paymentMethod == "") {
                        alert('กรุณาเลือกวิธีการชำระเงิน');
                        return false;
                    }
                }

                console.log(selected);
                console.log(tableId);
                console.log(customerIdValue);
                console.log(paymentMethod);
                console.log(amountMoney);

                if (selected == 'สั่งกลับบ้าน'){
                    takeaway(customerIdValue, paymentMethod, amountMoney);

                } else 
                if (selected == 'ทานที่ร้าน') {
                     table(tableId);
            } 
        }
            function takeaway(custId, paymentMethod, amountMoney) {
                var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'createTakeaway.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(xhr.responseText);
                            alert("คำสั่งซื้อเรียบร้อย");
                            window.location.href = 'menuPage.php?menuTypeId=6';
                        }
                    };

                    // แก้ไขรูปแบบของข้อมูลที่ส่ง
                    var data = 'custId=' + custId + '&paymentMethod=' + paymentMethod + '&amountMoney=' + amountMoney;
                    xhr.send(data);
            }

            function table(tableId) {
                var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'updateOrderTable.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(xhr.responseText);
                            alert("คำสั่งซื้อเรียบร้อย");
                            window.location.href = 'menuPage.php?menuTypeId=6';
                        }
                    };

                    // แก้ไขรูปแบบของข้อมูลที่ส่ง
                    var data = 'tableId=' + tableId;
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