<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white" style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <div id="topbar">
        <nav id="1">
            <div class="flex justify-between h-[6rem] px-10 shadow items-center smooth">
                <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                    <a href="../home/index.html">
                        <img src="logo.png" width="130px" height="130px"
                            class="self-center ml-[-20%] mt-[1%] transform hover:scale-105 transition-transform duration-100" /></a>

                </div>
                <button id="toggleMenu"
                    class="sm:hidden inline-flex items-center justify-center p-2 w-10 h-10 text-sm rounded-lg text-gray-400 transform hover:scale-105 transition-transform duration-100"
                    aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="flex space-x-4 items-center hidden sm:flex text-nowrap">
                    <a href="../reservation/index.php"
                        class="px-4 text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">สำรองที่นั่ง</a>
                    <div
                        class="text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">
                        <button
                            class="text-red-700 text-sm transform hover:scale-[105%] hover:text-red-500 transition-transform duration-100"
                            type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </div>
                    <div class="divide-x"></div>
					<a href="../../index.php"
                    class="flex px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                    <svg class="ml-3" fill="#E53B17"  height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                    </a>
                </div>
            </div>
            <div class="hidden w-full" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg justify-center items-center bg-gray-50">
                    <li>
                        <a href="../reservation/index.php"
                            class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">สำรองที่นั่ง</a>
                    </li>
                    <li>
                        <button class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </li>
                    <li>
                    <button class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            <a href="../../index.php"
                        class="font-medium flex px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                        </a>
                        </button>
                    
                    </li>
                </ul>
            </div>
        </nav>

        <div id="drawer-example"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 "
            tabindex="-1" aria-labelledby="drawer-label">
            <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base text-red-700 font-semibold"><svg
                    class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>รีวิว</h5>
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                class="text-gray-400 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>

            <form class="" method="post">
                <div class="flex items-center px-3 py-2 rounded-lg">
                    <textarea id="chat" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-full border border-gray-300"
                        placeholder="เขียนข้อความ"></textarea>
                    <button type="submit" onclick="sendfeedback();" class="inline-flex justify-center p-2  rounded-full cursor-pointer">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90 text-red-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </form>
            <hr class="h-px my-8 bg-black">
            <?php 
                $servername = "localhost";
                $username = "048"; //ตามที่กำหนดให้
                $password = "earth12"; //ตามที่กำหนดให้
                $dbname = "maji";    //ตามที่กำหนดให้
                
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "SELECT content, feedback_date FROM feedback";
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


    <div id="default-carousel" class="w-[100vw] h-[100vh] fixed mt-0 rounded-3xl" data-carousel="slide" style="background-size: cover;">
        <div class="relative h-screen object-cover overflow-hidden">
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="poster4.png" class="absolute block w-full"
                    style="width: 100vw; height: 89vh; object-fit: cover;">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="poster2.png" class="absolute block w-full"
                    style="width: 100vw; height: 89vh; object-fit: cover;">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="poster1.png" class="absolute block w-full"
                    style="width: 100vw; height: 89vh; object-fit: cover;">
            </div>
        </div>
        <button type="button" class="fixed top-20 start-0 z-30 h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-white">
                <svg class="w-4 h-4 text-gray-50  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="fixed top-20 end-0 z-30 h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-white">
                <svg class="w-4 h-4 text-gray-50 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    </div>

    </div>
    <div class="flex justify-center fixed bottom-40 ml-0 scale-[150%] max-[650px]:scale-[110%] max-[650px]:ml-[-6%]">
        <a href="../delivery/index.html"
            class="flex px-3 py-1 ml-4 text-bold items-center rounded-full text-white  text-sm bg-red-600 shadow-red-500">
            <svg class="animate-pulse mr-2" fill="#FFFFFF" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 612 612"
                xml:space="preserve" stroke="#ec2222">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                        <g>
                            <path
                                d="M226.764,375.35c-28.249,0-51.078,22.91-51.078,51.16c0,28.166,22.829,51.078,51.078,51.078s51.078-22.912,51.078-51.078 C277.841,398.26,255.013,375.35,226.764,375.35z M226.764,452.049c-14.125,0-25.54-11.498-25.54-25.541 c0-14.123,11.415-25.539,25.54-25.539c14.124,0,25.539,11.416,25.539,25.539C252.302,440.551,240.888,452.049,226.764,452.049z M612,337.561v54.541c0,13.605-11.029,24.635-24.636,24.635h-26.36c-4.763-32.684-32.929-57.812-66.927-57.812 c-33.914,0-62.082,25.129-66.845,57.812H293.625c-4.763-32.684-32.93-57.812-66.845-57.812c-33.915,0-62.082,25.129-66.844,57.812 h-33.012c-13.606,0-24.635-11.029-24.635-24.635v-54.541H612L612,337.561z M494.143,375.35c-28.249,0-51.16,22.91-51.16,51.16 c0,28.166,22.912,51.078,51.16,51.078c28.166,0,51.077-22.912,51.077-51.078C545.22,398.26,522.309,375.35,494.143,375.35z M494.143,452.049c-14.125,0-25.539-11.498-25.539-25.541c0-14.123,11.414-25.539,25.539-25.539 c14.042,0,25.539,11.416,25.539,25.539C519.682,440.551,508.185,452.049,494.143,452.049z M602.293,282.637l-96.817-95.751 c-6.159-6.077-14.453-9.526-23.076-9.526h-48.86v-18.313c0-13.631-11.004-24.635-24.635-24.635H126.907 c-13.55,0-24.635,11.005-24.635,24.635v3.86L2.3,174.429l177.146,23.068L0,215.323l178.814,25.423L0,256.25l102.278,19.29 l-0.007,48.403h509.712v-17.985C611.983,297.171,608.452,288.796,602.293,282.637z M560.084,285.839h-93.697 c-2.135,0-3.86-1.724-3.86-3.859v-72.347c0-2.135,1.725-3.86,3.86-3.86h17.82c0.985,0,1.971,0.411,2.71,1.068l75.796,72.347 C565.257,281.569,563.532,285.839,560.084,285.839z">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
            <span class="animate-pulse">สั่งอาหารทันที</span>

        </a>
    </div>

    <div class="flex justify-center items-center mt-[-5%]">
        <div id="header-service-type-button" class="header-service-type-button-group delivery" ng-class="deliveryType">
        </div>
    </div>





    <script>
        function sendfeedback() {
            var feedbackText = document.getElementById("chat").value;
            if (feedbackText.trim() == "") {
                alert("โปรดกรอกข้อความ");
                return;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            };

            xhttp.open("POST", "feedback.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("feedbackText=" + feedbackText );
        }

        document.addEventListener('DOMContentLoaded', function () {
            const toggleMenu = document.getElementById('toggleMenu');
            const navbarHamburger = document.getElementById('navbar-hamburger');

            toggleMenu.addEventListener('click', function () {
                navbarHamburger.classList.toggle('hidden');
            });
        });
        const deliveryButton = document.getElementById('delivery-button');
        const pickupButton = document.getElementById('pickup-button');
        const deliveryButton2 = document.getElementById('delivery-button2');
        const pickupButton2 = document.getElementById('pickup-button2');
        const dropdownButton = document.getElementById('dropdownbutton');
        const dropdownMenu = document.getElementById('dropdownmenu');
        const dropdownMenu2 = document.getElementById('dropdownmenu2');
        const rotateIcon = document.getElementById('rotateicon');
        const choose = document.getElementById('choose');

        deliveryButton.addEventListener('click', function () {
            this.classList.add('bg-red-500', 'text-white');
            pickupButton.classList.remove('bg-red-500', 'text-white');
            choose.innerText = 'เลือกที่อยู่';

        });

        pickupButton.addEventListener('click', function () {
            this.classList.add('bg-red-500', 'text-white');
            deliveryButton.classList.remove('bg-red-500', 'text-white');
            choose.innerText = 'เลือกสาขา';
        });
        deliveryButton2.addEventListener('click', function () {
            this.classList.add('bg-red-500', 'text-white');
            pickupButton2.classList.remove('bg-red-500', 'text-white');
            choose.innerText = 'เลือกที่อยู่';

        });
        pickupButton2.addEventListener('click', function () {
            this.classList.add('bg-red-500', 'text-white');
            deliveryButton2.classList.remove('bg-red-500', 'text-white');
            choose.innerText = 'เลือกสาขา';
        });

        dropdownButton.addEventListener('click', function () {
            if (choose.innerText === 'เลือกสาขา') {
                dropdownMenu2.classList.toggle('hidden');
                if (rotateIcon.style.transform === 'rotate(0deg)') {
                    rotateIcon.style.transform = 'rotate(180deg)';
                } else {
                    rotateIcon.style.transform = 'rotate(0deg)';
                }
            } else {
                dropdownMenu.classList.toggle('hidden');
                if (rotateIcon.style.transform === 'rotate(0deg)') {
                    rotateIcon.style.transform = 'rotate(180deg)';
                } else {
                    rotateIcon.style.transform = 'rotate(0deg)';
                }
            }
        });


        window.addEventListener('click', function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownMenu2.classList.add('hidden');
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.querySelector('[data-carousel="slide"]');
            const carouselItems = carousel.querySelectorAll('[data-carousel-item]');
            const prevButton = carousel.querySelector('[data-carousel-prev]');
            const nextButton = carousel.querySelector('[data-carousel-next]');
            let currentIndex = 0;

            function showSlide(index) {
                carouselItems.forEach(item => item.classList.add('hidden'));
                carouselItems[index].classList.remove('hidden');
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % carouselItems.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
                showSlide(currentIndex);
            }

            prevButton.addEventListener('click', prevSlide);
            nextButton.addEventListener('click', nextSlide);

            // Show the first slide initially
            showSlide(currentIndex);
        });
    </script>

</body>

</html>