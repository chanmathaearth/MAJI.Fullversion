<!DOCTYPE html>
<html lang="th">
<?php
$servername = "localhost";
$username = "g23japaneseres";
$password = "4401MPW561A";
$dbname = "maji";    //ตามที่กำหนดให้
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>

<head>
	<meta charset="UTF-8" />
	<script src="https://cdn.tailwindcss.com"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Dashboard</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
	<style>
		html {
			scroll-behavior: smooth;
		}
	</style>
</head>

<body onload="today()" class="bg-white" style="
	  font-family: Prompt, sans-serif;
	  font-weight: 300;
	  font-style: normal;
	">
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
	<div class="justify-center mx-auto">
		<div class="text-gray-600">
			<div class=" px-4 pt-6">
				<div class="grid gap-4 xl:grid-cols-3 p-10 ">
					<div class="bg-white p-4 shadow-md rounded-md p-4 2xl:col-span-2 sm:p-6 ">

						<div class="flex items-center justify-between mb-4">
							<div class="flex-shrink-0">
								<span class="text-[30px] font-bold leading-none text-amber-800" id="amount">$</span>
								<h3 class="text-base font-light text-gray-500" id="describe">
									ยอดขาย
								</h3>
							</div>
							<div class="flex justify-between items-center animate-pulse">
								<svg class=" w-6 h-6 text-white scale-[520%] mr-5 opacity-10" aria-hidden="true"
									xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-width="2"
										d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
								</svg>
							</div>
						</div>

						<div id="main-chart"></div>

						<div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6">
							<div>
								<button
									class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900"
									type="button" data-dropdown-toggle="weekly-sales-dropdown">
									เลือกระยะเวลา
									<svg class="w-4 h-4 ml-2 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
										xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M19 9l-7 7-7-7"></path>
									</svg>
								</button>

								<div class="z-50 hidden my-4 text-base list-none bg-gray-50 divide-y divide-gray-100 rounded shadow"
									id="weekly-sales-dropdown">
									<ul class="py-1" role="none">
										<li>
											<button onclick="yesterday()"
												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
												role="menuitem">เมื่อวาน</button>
										</li>
										<li>
											<button onclick="today()"
												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
												role="menuitem">วันนี้
											</button>
										</li>
										<li>
											<button onclick="thirty()"
												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
												role="menuitem">30
												วันที่ผ่านมา
											</button>
										</li>
										<li>
											<button onclick="ninety()"
												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
												role="menuitem">90
												วันที่ผ่านมา
											</button>
										</li>
									</ul>
								</div>
							</div>

						</div>


					</div>
					<div class="bg-white p-4 shadow-md rounded-md p-4 2xl:col-span-2 sm:p-6 2xl:col-span-2 sm:p-6 ">
						<div class="flex justify-between mb-4">

							<div class="flex-shrink-0">

								<span class="text-[30px] font-bold leading-none text-amber-800"> เมนูยอดนิยม</span>

								<?php
								$sql = "SELECT menuid, COUNT(*) AS count FROM orderdetail GROUP BY menuid ORDER BY `count` DESC Limit 4";
								$result = mysqli_query($conn, $sql);
								$num = 1;

								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$sqlmenu = "SELECT menuName, menuImage FROM `menu` WHERE menuId = " . $row["menuid"];
										$result1 = mysqli_query($conn, $sqlmenu);
										$row1 = mysqli_fetch_assoc($result1);
										if ($num == 1) {
											echo '
											<img class="flex mx-auto" src="' . $row1["menuImage"] . '" width="150px" height="150px">
											<p class="text-base font-light text-gray-500 mt-2">' . $num . '. ' . $row1["menuName"] . '</p>
										';
										} else {
											echo '
										<div class="mx-auto items-center">
											<p class="text-base font-light text-gray-500 mt-2">' . $num . '. ' . $row1["menuName"] . '</p>
										</div>
										';
										}
										$num++;
									}
								}

								?>

							</div>
							<div class="animate-pulse">
							<svg class=" w-6 h-6 text-white scale-[320%] mr-2 opacity-10 mt-3" aria-hidden="true"
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path
									d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
							</svg>
							</div>

						</div>
					</div>

					<div class="bg-white p-4 shadow-md rounded-md p-4 2xl:col-span-2 sm:p-6 2xl:col-span-2 sm:p-6 ">
						<div class="flex  justify-between mb-4">

							<div class="flex-shrink-0">
								<span class="text-[30px] font-bold leading-none text-amber-800">จำนวนออเดอร์</span>
								<?php
								$sqlfororder = "SELECT COUNT(*) as count FROM `orders` WHERE DATE_FORMAT(orderDateTime, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m');";
								$resultfororder = mysqli_query($conn, $sqlfororder);
								$rowfororder = mysqli_fetch_assoc($resultfororder);
								echo
									'
									<p class="text-base font-light text-gray-500 mt-2"><span
										class="text-bold text-[24px]">' . $rowfororder['count'] . '</span> ออเดอร์</p>
								';
								$sqllastmonth = "SELECT COUNT(*) as count FROM `orders` WHERE DATE_FORMAT(orderDateTime, '%Y-%m') = DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m');
								";
								$resultlastmonth = mysqli_query($conn, $sqllastmonth);
								$rowlastmonth = mysqli_fetch_assoc($resultlastmonth);
								echo
									'
									<p class="text-base font-light mt-5"><span
									class="text-bold text-[25px] text-green-600">+' . $rowfororder['count'] - $rowlastmonth['count'] . '</span> จากเดือนที่แล้ว</p>
								';
								?>


							</div>
							<div class="animate-pulse">

							<svg class=" w-6 h-6 text-white scale-[320%] mr-2 opacity-10 mt-3" aria-hidden="true"
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path fill-rule="evenodd"
									d="M4 4c0-.6.4-1 1-1h1.5c.5 0 .9.3 1 .8L7.9 6H19a1 1 0 0 1 1 1.2l-1.3 6a1 1 0 0 1-1 .8h-8l.2 1H17a3 3 0 1 1-2.8 2h-2.4a3 3 0 1 1-4-1.8L5.7 5H5a1 1 0 0 1-1-1Z"
									clip-rule="evenodd" />
							</svg>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>

	</div>

	</div>
	<div class="grid gap-4 grid-cols-2 p-10 rounded-full flex justify-center ">

		<div class=" shadow-lg rounded-lg  h-[60%] w-[100%]">
			
			<span
				class="text-[30px] font-bold leading-none text-amber-800 mt-6 flex ml-6">วันที่ลูกค้าเข้ารับบริการ</span>
			<canvas class="p-1 p-10 w-full" id="chartPie"></canvas>
			
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
			const xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					const data = JSON.parse(this.responseText);

					const weeklydata = {
						labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
						datasets: [
							{
								label: "Weekly",
								data: data,
								backgroundColor: [
									"rgb(255, 99, 132)",  // สีแดง
									"rgb(255, 159, 64)",   // สีส้ม
									"rgb(255, 205, 86)",   // สีเหลือง
									"rgb(75, 192, 192)",   // สีเขียวเข้ม
									"rgb(54, 162, 235)",   // สีน้ำเงิน
									"rgb(153, 102, 255)",  // สีม่วง
									"rgb(201, 203, 207)"   // สีเทา
								],
								hoverOffset: 4,
							},
						],
					};

					const configPie = {
						type: "pie",
						data: weeklydata,
						options: {},
					};

					var chartPie = new Chart(document.getElementById("chartPie"), configPie);
				}
			};

			const url = "getData.php";

			xhr.open("GET", url, true);

			xhr.send();

		</script>
		<div class="bg-white p-4 shadow-md rounded-md p-4 2xl:col-span-2 sm:p-6 2xl:col-span-2 sm:p-6 overflow-y-auto h-[60%]">
			<div class="flex  justify-between mb-4">

				<div class="flex-shrink-0">
					<span class="text-[30px] font-bold leading-none text-amber-800">Feedback จากลูกค้า</span>
				</div>
				<div class="animate-pulse">

				<svg class="w-6 h-6 text-white scale-[320%] mr-2 opacity-10 mt-3" aria-hidden="true"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path fill-rule="evenodd"
						d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
						clip-rule="evenodd" />
				</svg>
				</div>

			</div>
			<?php 
                $servername = "localhost";
                $username = "048"; //ตามที่กำหนดให้
                $password = "earth12"; //ตามที่กำหนดให้
                $dbname = "maji";    //ตามที่กำหนดให้
                
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "SELECT content, feedback_date FROM feedback ORDER BY feedback_date DESC;
				";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        setlocale(LC_ALL, 'th_TH.utf-8');
                        $content = $row['content'];
                        $datefromdb = $row['feedback_date'];
                        $timestamp = strtotime($datefromdb);
                        $thai_months = array(
                            '01' => 'มกราคม',
                            '02' => 'กุมภาพันธ์',
                            '03' => 'มีนาคม',
                            '04' => 'เมษายน',
                            '05' => 'พฤษภาคม',
                            '06' => 'มิถุนายน',
                            '07' => 'กรกฎาคม',
                            '08' => 'สิงหาคม',
                            '09' => 'กันยายน',
                            '10' => 'ตุลาคม',
                            '11' => 'พฤศจิกายน',
                            '12' => 'ธันวาคม'
                        );
                        $day = date('j', $timestamp);
                        $month = $thai_months[date('m', $timestamp)];
                        $year = date('Y', $timestamp);
                        $date = $day . ' ' . $month . ' ' . ($year + 543);
                        echo
                        '
                        <article class="p-6 text-base bg-white">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full"
                                            src="https://images.nightcafe.studio//assets/profile.png?tr=w-1600,c-at_max"></p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                            >'.$date.'</time></p>
                                </div>
                            </footer>
                            <p class="text-gray-500 text-left">'.$content.'</p>
                        </article>
                        '
                        ;


                    }
                }
            
            ?>
			</div>
		</div>
	</div>
	<script>
		function yesterday() {
			document.getElementById("describe").textContent = "ยอดเงินรวมเมื่อวาน";
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("amount").textContent = this.responseText + "$";
				}
			};
			xhttp.open("GET", "totalyesterday.php", true);
			xhttp.send();
		}

		function today() {
			document.getElementById("describe").textContent = "ยอดเงินรวมวันนี้";


			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("amount").textContent = this.responseText + "$";
				}
			};
			xhttp.open("GET", "totaltoday.php", true);
			xhttp.send();

		}


		function thirty() {
			document.getElementById("describe").textContent = "ยอดเงินรวม 30 วันที่แล้ว";
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("amount").textContent = this.responseText + "$";
				}
			};
			xhttp.open("GET", "totalthirty.php", true);
			xhttp.send();

		}

		function ninety() {
			document.getElementById("describe").textContent = "ยอดเงินรวม 90 วันที่แล้ว";
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("amount").textContent = this.responseText + "$";
				}
			};
			xhttp.open("GET", "totalninety.php", true);
			xhttp.send();

		}
	</script>


	<div class="flex flex-col mt-6 p-10">
		<div class="overflow-x-auto rounded-lg">
			<div class="inline-block min-w-full align-middle">
				<div class="overflow-hidden shadow sm:rounded-lg">
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