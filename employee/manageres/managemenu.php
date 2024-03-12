<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="fetchmainNav.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }
    </style>

</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <div id="mainnavbar"></div>
    <div class="bg-white pr-8 pl-8 pb-8">
        <div class="grid place-content-center gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
            <div class="col-span-3 sm:col-span-4">
                <div id="blaktomenu" class="hover:text-red-600 ">
                    <a href="manageRes.html" class="">
                        <span class="flex ">
                            <svg class="justify-center mt-0.5 mr-1 ring-1 ring-red-500 rounded-full" height="20px" width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            ย้อนกลับ
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-[3%] max-[650px]:grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 justify-center">
            <div class="w-1/2 max-[650px]:w-full sm:w-full  md:w-1/2  lg:w-1/2  mx-auto bg-white p-8 rounded-md shadow-md m-2">
                <h2 class="text-red-500 text-2xl font-semibold mb-6">จัดการเมนูอาหาร</h2>


                <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="ml-3 mb-4">
                        <div class="container mx-auto ">
                            <label for="sele" class="block text-sm font-medium text-black">เลือกวิธีการจัดการ</label>
                            <div class="">
                                <select id="sele" name="sele" class="mt-1  block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-black bg-white" required>
                                    <option value="" disabled selected> แก้ไข / เพิ่ม / ลบ</option>
                                    <option value="edit">แก้ไข</option>
                                    <option value="add">เพิ่ม</option>
                                    <option value="delete">ลบ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 ml-3">
                        <label for="name" class="block text-sm font-medium text-gray-900">หมายเลขรหัสเมนู :</label>
                        <input type="number" value="ไม่สามารแก้ไขค่าได้" readonly id="menuId" name="menuId" class="cursor-not-allowed text-gray-700 bg-gray-300 mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4 ml-3">
                        <label for="name" class="block text-sm font-medium text-gray-900">ชื่อเมนู :</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" placeholder="ไก่ทอดราดซอสนัมบัง" required>
                    </div>

                    <div class="mb-4 ml-3">
                        <label for="price" class="block text-sm font-medium text-gray-900">ราคา :</label>
                        <input type="number" id="price" name="price" class="mt-1 p-2 w-full border rounded-md" placeholder="200" required>
                    </div>

                    <div class="mb-4 ml-3">
                        <label for="desc" class="block text-sm font-medium text-gray-900">รายละเอียดเมนู :</label>
                        <input type="text" id="desc" name="desc" class="mt-1 p-2 w-full border rounded-md" placeholder="เซตไก่ทอดราดซอสนัมบัง" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-3 mb-4 ml-3">
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-900">เวลาในการทำ :</label>
                            <div class=" flex flex-row-reverse mt-1">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border  rounded-r-md">
                                    นาที
                                </span>

                                <input type="number" id="time" name="time" class=" p-2 w-full border rounded-l-md" placeholder="10" required>

                            </div>
                        </div>
                        <div>
                        <label class="block text-sm font-medium text-black">ประเภท</label>
                            <div class="">
                                <select id="Type" name="Type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-black bg-white" required>
                                    <option value="" disabled selected> เลือกประเภทอาหาร</option>
                                    <option value="6"> สิทธิพิเศษ </option>
                                    <option value="1"> ชุดเซ็ต </option>
                                    <option value="2"> ดงบุรี </option>
                                    <option value="3"> เบนโตะ </option>
                                    <option value="4"> ราเม็ง </option>
                                    <option value="5"> เครื่องดื่ม </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="ml-3">

                        <div>
                            <label class="block mb-2 mt-3 text-sm font-medium text-black" for="file_input">ใส่รูปเมนู</label>
                            <input type="file" name="fileName" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white" id="file_input" type="file">
                            <div id="image" name="image"></div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" name="submit" class="w-full px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-900 focus:outline-none focus:ring focus:border-blue-300">
                            Submit
                        </button>
                    </div>
            </div>
        </div>
    </div>
    </form>
    <script>
        function fillForm(menuId, name, price, desc, type, image, time) {
            document.getElementById('menuId').value = menuId;
            document.getElementById('name').value = name;
            document.getElementById('price').value = price;
            document.getElementById('desc').value = desc;
            document.getElementById('time').value = time;

            var dropdown = document.getElementById('Type');
            for (var i = 0; i < dropdown.options.length; i++) {
                if (dropdown.options[i].value === type) {
                    dropdown.selectedIndex = i;
                    break;
                }
            }
            console.log(image);

            var imgElement = document.createElement('div');
            imgElement.innerHTML = `<img class="mx-auto mt-5" src="${image}" width="200px" height="200px">`;

            // Clear any existing content in the img div
            var imgDiv = document.getElementById('image');
            imgDiv.innerHTML = '';

            // Append the img element and paragraph elements to the img div
            imgDiv.appendChild(imgElement);
        }
    </script>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maji";

    // Create connection <div id="basket" class="w-w-1/4"></div>
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['submit'])) {

        $sele = $_POST['sele'];
        $menuId = $_POST['menuId'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $type = $_POST['Type'];
        $fileName = $_FILES["fileName"]["name"];
        $time = $_POST['time'];


        try {
            if ($sele == "edit") {
                $sql = "UPDATE menu SET menuId = '$menuId', menuName = '$name', menuImage = '$fileName', menuPrice = '$price', menuDescription = '$desc', menuTypeID = '$type', menuTime = '$time' WHERE menuId = '$menuId'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('การอัพเดทสำเร็จ'); window.location.reload;</script>";
                } else {
                    throw new Exception("การอัพเดทไม่สำเร็จ");
                }
            } else if ($sele == "delete") {
                $sql = "DELETE FROM menu WHERE menuId = '$menuId'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('การลบสำเร็จ'); window.location.reload;</script>";
                } else {
                    throw new Exception("การลบไม่สำเร็จ");
                }
            } else if ($sele == "add") {
                $sql = "INSERT INTO `menu`( `menuName`, `menuImage`, `menuPrice`, `menuDescription`, `menuTypeID`, `menuTime`) VALUES ('$name','$fileName',' $price','$desc','$type','$time')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('เพิ่มเมนูสำเร็จ'); window.location.reload;</script>";
                } else {
                    throw new Exception("เพิ่มเมนูไม่สำเร็จ");
                }
            }
        } catch (Exception $e) {
            echo "<script>alert('ไม่สามารถดำเนินการได้เนื่องจากมีการสั่งเมนูนี้'); window.location.reload;</script>";
        }
        
    }



    ?>
    <form method="GET" class="max-w-md mx-auto">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            
            <input type="search" name="menuName" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="ชื่อเมนู"/>
            <button type="submit" name="searchbutton" class="hidden flex mr-[8%] text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">ค้นหา</button>
            <button name="clear" class="flex items-center text-white absolute end-2.5 bottom-2.5 rounded-lg text-sm px-4 py-2"><svg class="w-5 h-5 text-gray-800 flex items-center ml-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
  </svg></button>

        </div>
    </form>

    </tbody>
    </div>
    </div>

    <div class="bg-white pr-8 pl-8 pb-8">
        <div class="flex justify-center">
            <table class="mt-10 w-1/2 border border-collapse ">
                <thead>
                    <tr class="bg-slate-200 w-full">
                        <th class="py-2 px-4 border"> ชื่อเมนู </th>
                        <th class="py-2 px-4 border"> ราคา </th>
                        <th class="py-2 px-4 border"> รายละเอียดเมนู </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $sql = "SELECT * FROM menu;";
                    $result = mysqli_query($conn, $sql);
                    if (isset($_GET['searchbutton'])) {
                        $show = $_GET['menuName'];
                        $sqlforsearch = "SELECT * FROM menu WHERE menuName LIKE '%$show%'";
                        $resultforsearch = mysqli_query($conn, $sqlforsearch);
                        if (mysqli_num_rows($resultforsearch) > 0) {
                            while ($row = mysqli_fetch_assoc($resultforsearch)) {
                                $menuId = $row['menuId'];
                                $menuName = $row['menuName'];
                                $menuPrice = $row['menuPrice'];
                                $menuDescription = $row['menuDescription'];
                                $menuTypeId = $row['menuTypeId'];
                                $menuImage = $row['menuImage'];
                                $menuTime = $row['menuTime'];


                                echo "<tr class='border'>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuName . "</a> </td>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuPrice . ".- </td>" .
                                    "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuDescription . "</td>" .
                                    "</tr>";
                            }
                        }
                    }
                    else if (isset($_GET['clear'])) 
                    {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                $menuId = $row['menuId'];
                                $menuName = $row['menuName'];
                                $menuPrice = $row['menuPrice'];
                                $menuDescription = $row['menuDescription'];
                                $menuTypeId = $row['menuTypeId'];
                                $menuImage = $row['menuImage'];
                                $menuTime = $row['menuTime'];


                                echo "<tr class='border'>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuName . "</a> </td>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuPrice . ".- </td>" .
                                    "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuDescription . "</td>" .
                                    "</tr>";
                            }
                        } 

                    }

                    else{
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                $menuId = $row['menuId'];
                                $menuName = $row['menuName'];
                                $menuPrice = $row['menuPrice'];
                                $menuDescription = $row['menuDescription'];
                                $menuTypeId = $row['menuTypeId'];
                                $menuImage = $row['menuImage'];
                                $menuTime = $row['menuTime'];


                                echo "<tr class='border'>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuName . "</a> </td>";
                                echo "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuPrice . ".- </td>" .
                                    "<td class='py-2 px-4 border'> <a href='javascript:fillForm(\"" . $menuId . "\",\"" . $menuName . "\", \"" . $menuPrice . "\", \"" . $menuDescription . "\", \"" . $menuTypeId . "\", \"" . $menuImage . "\", \"" . $menuTime . "\")'>" . $menuDescription . "</td>" .
                                    "</tr>";
                            }
                        } 
                    }
                    echo "</table>";
                    mysqli_close($conn);
                    ?>
                </tbody>
        </div>
    </div>


    <script>
        document.getElementById('search').addEventListener('click', function() {
            var searchText = document.getElementById('default-search').value.toLowerCase();
            var table = document.getElementById('menuTable');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) { // ข้ามแถวหัวตาราง
                var cells = rows[i].getElementsByTagName('td');
                var showRow = false;

                for (var j = 0; j < cells.length; j++) {
                    var cellText = cells[j].innerText.toLowerCase();
                    if (cellText.includes(searchText)) {
                        showRow = true;
                        break;
                    }
                }

                rows[i].style.display = showRow ? '' : 'none';
            }
        });
    </script>
</body>

</html>
