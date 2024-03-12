<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        .sidebar-container {
            width: 100%;
            position: fixed;
            backdrop-filter: blur(20px);
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

<script>

    function getCurrentDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();

        return yyyy + '-' + mm + '-' + dd;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var storedDate = localStorage.getItem('selectedDate');
        document.getElementById('selectedDate').value = storedDate || getCurrentDate();
        var form = document.querySelector('form');

        if (form) {
            form.addEventListener('submit', function() {
                localStorage.setItem('selectedDate', document.getElementById('selectedDate').value);
            });
        }
    });

    function popup(tableName, status) {
        if (status == 'ว่าง') {
            fetch('popup.php?tableName=' + tableName)
                .then(response => response.text())
                .then(data => {
                    var popupContainer = document.getElementById('popupDisplay');
                    if (popupContainer) {
                        // Update the content of the popup
                        popupContainer.innerHTML = data;

                        document.getElementById('confirmButton').setAttribute('onclick', 'confirm("' + tableName + '")');
                    }
                })
                .catch(error => console.error('Error:', error));
        } else if (status == 'ไม่ว่าง') {
            fetch('orderDetail.php?tableName=' + tableName)
                .then(response => response.text())
                .then(data => {
                    var orderDetail = document.getElementById('orderDetail');

                    // Update the content of the popup
                    orderDetail.innerHTML = data;


                })
                .catch(error => console.error('Error:', error));
        }
    }

    function confirm(tableName) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                console.log(tableName);
                location.reload();
            }
        };
        xhr.send('tableName=' + tableName);
    }

    function cancel() {
        var popupContainer = document.getElementById('popupDisplay');
        if (popupContainer) {
            popupContainer.innerHTML = '';
        }
    }

    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
</script>
<script>
    function show() {
        window.location.href = "recipe.php";
    }
</script>

<body class="bg-white" style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <div id="topbar"></div>
    <div id="popupDisplay"></div>
    <div class="flex justify-center items-center">
        <div class="flex flex-wrap justify-center items-center">
            <div class="box-border w-90 p-4 mt-10 bg-gray-100 rounded-3xl flex justify-center items-center selfs-center">
                <div class="w-50">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex items-center">
                        <input type="date" id="selectedDate" name="selectedDate" class="block w-30 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" required>
                        <button type="submit" class="ml-4 bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-300">Submit</button>
                    </form>
                    <p class="font-[20%] font-medium text-center text-2xl mb-8"> เลือกโต๊ะ</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 p-4 ">
                        <?php
                        $sql = "SELECT tableTypeId, tableTypeStatus FROM tabletype";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $countStatusgreen = 0;
                            $countStatusred = 0;
                            while ($row = $result->fetch_assoc()) {
                                $tableName = $row['tableTypeId'];
                                $status = $row['tableTypeStatus'];

                                echo '<div onclick="popup(\'' . $tableName . '\', \'' . $status . '\')" id="' . $tableName . '" class="rounded-full bg-white w-32 h-24 flex items-center justify-center text-black border-8 ';

                                if ($status == 'ว่าง') {
                                    echo 'border-green-500';
                                    $countStatusgreen++;
                                } elseif ($status == 'ไม่ว่าง') {
                                    echo 'border-red-500';
                                    $countStatusred++;
                                }

                                echo ' shadow-lg hover:scale-110 transition-transform duration-100 hover:animate-pulse">';

                                echo '<p class="text-center" name="customer"><span class="font-bold text-lg" name="table">' . $tableName . '</span><br>' . $status . '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo "No results";
                        }


                        ?>
                    </div>
                    <div class="flex justify-center ml-1 mt-5">
                        <p class="font-[20%] font-medium text-center mr-5">สถานะ</p>
                        <span class="rounded-full bg-green-500 w-5 h-5 flex text-center whitespace-nowrap">
                            <p class="ml-7" name="statusfree">ว่าง <?php echo $countStatusgreen ?></p>
                        </span>
                        <span class="rounded-full bg-red-500 w-5 h-5 flex text-center ml-20 whitespace-nowrap">
                            <p class="ml-7" name="statusbusy">ไม่ว่าง <?php echo $countStatusred ?></p>
                        </span>
                    </div>
                </div>
                <div class="w-60 mt-[-30%]">

                    <div class="overflow-y-auto max-h-80">
                        <p class="font-[20%] font-medium text-center text-xl mb-4"> คิวการจอง</p>
                        
                        <?php

                        $reservationQuery = "SELECT reservationId, custId, tableTypeId, Date(appointmentDateTime) AS date, TIME(appointmentDateTime) AS time, peopleReserved FROM reservation";
                        $reservationResult = $conn->query($reservationQuery);

                        if ($reservationResult === FALSE) {
                            echo "Error: " . $conn->error;
                        } else {
                            while ($row = $reservationResult->fetch_assoc()) {
                                $reservationId = $row['reservationId'];
                                $customerId = $row['custId'];
                                $tableName = $row['tableTypeId'];
                                $date = $row['date'];
                                $time = $row['time'];
                                $numberOfPeople = $row['peopleReserved'];

                                $selectedDate = $_POST['selectedDate'];

                                if ($selectedDate == $date) {
                                    $customerNameQuery = "SELECT custName FROM customer WHERE custId = '$customerId'";
                                    $customerNameResult = $conn->query($customerNameQuery);

                                    if ($customerNameResult === FALSE) {
                                        echo "Error fetching customer name: " . $conn->error;
                                    } else {
                                        $customerNameRow = $customerNameResult->fetch_assoc();
                                        $customerName = $customerNameRow['custName'];
                                    }

                                    $formattedTime = date('H:i', strtotime($time));

                                    echo '<div class="rounded-full box-border bg-gray-300 hover:bg-gray-500 hover:text-black p-1 m-2">';
                                    echo '<span class="flex rounded-full bg-gray-200 w-10 h-10 p-2 whitespace-nowrap mr-2">' . $tableName . '<p class="ml-6">' . $customerName . '<span class="ml-4">' . $numberOfPeople . ' คน</span><span class="ml-10">' . $formattedTime . '</span></p> </span>';
                                    echo '</div>';
                                }
                            }
                        }

                        ?>
                    </div>


                </div>

            </div>
            <div id="myModal" tabindex="-1" aria-hidden="true" class="backdrop-blur-md hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

                <div class="modal-content">
                    <div class="w-[82%] mx-auto p-26">

                        <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
                            <div class="text-right font-size">
                                <button> <span class="text-black hover:text-red-400 text-[20px] mt-[-2%]" onclick="closeModal()">&times;</span>
                                </button>
                            </div>
                            <div class="text-[16px] mt-[-7%]">
                                <p class="text-center">หมายเลขโต๊ะ</p>
                            </div>
                            <div class="text-[22px]">
                                <p class="text-center">A8</p>
                            </div>
                            <hr class="mt-4 mb-4">

                            <div class="flex justify-center mb-2">
                                <img src="/assets/promtpay.jpeg" width="100px" height="100px">
                            </div>

                            <div class="text-[20px]">
                                <p class="text-center font-bold">ร้านอาหารมาจิ</p>
                            </div>
                            <p class="text-center">สาขาลาดกะบัง</p>
                            <p class="text-center text-[13px] ml-2 mr-2">ซอย ฉลองกรุง 1, แขวงลาดกระบัง, เขตลาดกระบัง,<br> กรุงเทพมหานคร 10520
                            </p>
                            <p class="text-center mt-2">Tel: 0631174147</p>
                            <p class="text-center mt-2">ใบเสร็จรับเงิน</p>


                            <hr class="mt-4 mb-4">
                            <p class="mt-2 text-[14px]">โต๊ะ: A8</p>
                            <p class="mt-2 text-[14px]">แขก: 4</p>
                            <div class="flex justify-between">
                                <p class="mt-2 text-[14px]">วัน: 04/03/24</p>
                                <p class="mt-2 text-[14px]">เวลา: 20:05</p>

                            </div>
                            <hr class="mt-4 mb-4">

                            <table class="w-full mb-8">
                                <thead>
                                    <tr>
                                        <th class="text-left font-bold text-gray-700">รายการ</th>
                                        <th class="text-right font-bold text-gray-700">จำนวนเงิน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left text-gray-700">สินค้า 1</td>
                                        <td class="text-right text-gray-700">$100.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left text-gray-700">สินค้า 2</td>
                                        <td class="text-right text-gray-700">$50.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left text-gray-700">สินค้า 3</td>
                                        <td class="text-right text-gray-700">$75.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-left font-bold text-gray-700">รวมทั้งหมด</td>
                                        <td class="text-right font-bold text-gray-700">$225.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <hr class="mt-4 mb-4">

                            <div class="text-gray-700 mb-2 text-center">ขอบคุณที่ใช้บริการ!</div>

                            <div class="flex justify-center mt-4">
                                <button onclick="window.print()">
                                    <svg class="w-6 h-6 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5c0 1.1.9 2 2 2h1v-4c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4c0 .6-.4 1-1 1H9Z" clip-rule="evenodd" />
                                    </svg>

                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    </div>

    <?php
    $conn->close();
    ?>



    <div id="orderDetail" class="sm:rounded-lg w-[80%] mx-auto mb-20 mt-10 sm:rounded-3xl flex justify-center items-center">

    </div>


    </div>
    <script>
        function payment(tableId, orderId, amountMoney) {
            var paymentMethod = document.getElementById("payment-method").value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'payment.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    console.log(result);
                    alert("โต๊ะ " + tableId + " ชำระเงินเสร็จสิ้น");
                    window.location.reload();
                }
            };
            xhr.send('tableId=' + tableId + '&orderId=' + orderId + '&amountMoney=' + amountMoney + '&paymentMethod=' + paymentMethod);
        }
    </script>
</body>

</html>