<!DOCTYPE html>
<html lang="th">
<?php
$servername = "localhost";
$username = "048"; //ตามที่กำหนดให้
$password = "earth12"; //ตามที่กำหนดให้
$dbname = "maji";    //ตามที่กำหนดให้
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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

<body class="bg-white" style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <nav>
        <div class="flex justify-center h-[6rem] px-10 shadow items-center">
            <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse">
                <img src="logo.png" width="130px" height="130px"
                    class="self-center ml-[-20%] mt-[5%] transform hover:scale-105 transition-transform duration-100" />
            </div>
            <div class="flex space-x-4 items-center">
                <a href="../signup/signup.html"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">เมนู</a>
                <a href="../signup/signup.html"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">โต๊ะอาหาร</a>
                <a href="../signup/signup.html"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ส่งอาหาร</a>
                <a href="../dashboard/index.php"
                    class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ข้อมูล</a>
            </div>
        </div>
    </nav>
    <div class="flex justify-center items-center mt-[-5%]">
        <div class="flex flex-wrap justify-center h-screen items-center">
            <div
                class="box-border w-90 p-4 mt-10 bg-gray-100 rounded-3xl flex justify-center items-center selfs-center ">
                <div class="w-50">
                    <p class="text-[20px] font-medium text-center mb-4"> เลือกโต๊ะ</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 p-4 "
                        id="tablemanage">
                        <?php
                        $sql = "SELECT tableTypeId, tableTypeStatus FROM tableType";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $tableName = $row['tableTypeId'];
                                $status = $row['tableTypeStatus'];

                                echo '<button> <div data-modal-target="static-modal-' . $tableName . '" data-modal-toggle="static-modal-' . $tableName . '" class="rounded-full bg-white w-32 h-24 flex items-center justify-center text-black border-8 ';
                                if ($status == 'ว่าง') {
                                    echo 'border-green-500';
                                } elseif ($status == 'ไม่ว่าง') {
                                    echo 'border-red-500';
                                } else {
                                    echo 'border-gray-500';
                                }
                                echo ' shadow-lg hover:scale-110 transition-transform duration-100 hover:animate-pulse">';

                                echo '<p class="text-center" name="customer"><span class="font-bold text-lg" id="tablenumber">' . $tableName . '</span><br>' . $status . '</p>';
                                echo '</div></button>';
                                echo
                                    '
                                <div id="static-modal-' . $tableName . '" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" style="z-index: 100">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-3xl shadow">
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        แก้ไขโต๊ะอาหารของคุณ
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                        data-modal-hide="static-modal-' . $tableName . '">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form class="p-4 md:p-5 space-y-4">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">ชื่อโต๊ะ
                                        <span class="text-[20px] ml-2">'.$tableName.'<span></label>
                                    <input type="text" name="name" id="table'.$tableName.'"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="เพิ่มชื่อโต๊ะอาหารของคุณ" minlength="1">
                                
                                    <div
                                        class="flex items-center p-4 md:p-5 rounded-3xlll dark:border-gray-600">
                                        <button onclick="edit(this)" id="'.$tableName.'" data-modal-hide="static-modal-' . $tableName . '" type="button"
                                            class="text-white bg-[#f43f5e] hover:bg-[#e11d48] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center">
                                            บันทึกการแก้ไข</button>
                                        <button data-modal-target="popup-modal-' . $tableName . '" data-modal-toggle="popup-modal-' . $tableName . '"
                                            type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-3xl border border-gray-200 hover:bg-gray-100">ลบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="popup-modal-' . $tableName . '" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" style="z-index: 101">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-3xl shadow">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-3xl text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="popup-modal-' . $tableName . '">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500">
                                        คุณแน่ใจที่จะลบโต๊ะอาหารนี้หรือไม่</h3>
                                    <button onclick="removeTable(this)" id="'.$tableName.'" data-modal-hide="popup-modal-' . $tableName . '" type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-3xl text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        ใช่, ลบโต๊ะอาหารนี้
                                    </button>
                                    <button data-modal-hide="popup-modal-' . $tableName . '" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-3xl border border-gray-200 hover:bg-gray-100 hover:text-blue-700">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                ';
                            }
                        } else {
                            echo "No results";
                        }

                        ?>


                        <script>
                            function edit(table) {
                            var id = table.getAttribute("id");
                            var inputId = "table" + id;
                            var tableName = document.getElementById(inputId).value;
                            if (tableName.trim() == "") {
                                alert("โปรดกรอกชื่อโต๊ะ");
                                return;
                            }

                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    window.location.reload();
                                }
                            };

                            xhttp.open("POST", "update.php", true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("tableName=" + tableName + "&id=" + id); // รวมข้อมูลให้เป็น query string และส่งไปยังเซิร์ฟเวอร์
                            window.location.reload();

                        }

                        </script>



                        <script>
                        function removeTable(table) {
                        var tableName = table.getAttribute("id");
                        var xhttp = new XMLHttpRequest();

                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                window.location.reload();
                            }
                        };
                        xhttp.open("POST", "remove.php", true);
                        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhttp.send("tableName=" + tableName);
                        window.location.reload();

                    }

                    </script>
                    </div>

                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" 
                        class="mt-4 flex mx-auto text-white bg-[#f43f5e] font-medium rounded-3xl text-sm px-5 py-2.5 text-center"
                        type="button">
                        เพิ่มโต๊ะอาหาร
                    </button>
                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-lg font-semibold text-gray-900 ">
                                        เพิ่มโต๊ะอาหาร
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <form class="p-4 md:p-5" method="post">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900">ชื่อโต๊ะ
                                                :</label>
                                            <input type="text" name="name" id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                placeholder="เพิ่มชื่อโต๊ะอาหารของคุณ" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="tablesize"
                                                class="block mb-2 text-sm font-medium text-gray-900">จำนวนที่นั่ง
                                                :</label>
                                            <input type="number" name="tablesize" id="tablesize"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                placeholder="เพิ่มจำนวนที่นั่งของโต๊ะ" required="">
                                        </div>
                                    </div>
                                    <button type="submit" name='addTable' id="addTable" onclick="add(this);"
                                        class="text-white inline-flex items-center bg-[#f43f5e] hover:bg-[#e11d48] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        เพิ่มโต๊ะอาหาร
                                    </button>
                                </form>

                                <script>
                                function add(button) {
                                    var tableName = document.getElementById("name").value; 
                                    var tableSize = document.getElementById("tablesize").value;
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            window.location.reload();
                                        }
                                    };

                                    xhttp.open("POST", "add.php", true);
                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
                                    xhttp.send("name=" + tableName + "&tablesize=" + tableSize);
                                }
                            </script>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php

    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>