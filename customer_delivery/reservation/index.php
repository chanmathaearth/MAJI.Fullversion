<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maji Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .sidebar-container {
            width: 100%;
            position: fixed;

        }
    </style>
</head>

<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <a href="../home/index.php">
        <div class="sidebar-container z-50 p-4 " id="sidebar">
			<svg class="w-6 h-6 text-gray-800 dark:text-white transform hover:scale-110 transition-transform duration-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
			  </svg>
		</div>
    </a>
    <div>
        <div class="z-20 inset-0 flex items-center justify-center p-6 sm:p-12 lg:p-20 fixed overflow-y-auto">
            <div class="absolute flex justify-center items-center w-screen fixed top-0 bottom-0 max-[375px]:mt-[80%]">
                <form action="" method="POST" class=" center-form justify-center items-center shadow-lg backdrop-blur-[20px] p-40 sm:p-7 rounded-3xl absolute sm:w-3/4 lg:w-1/2">
                    <p class="text-center mb-10 font-20 font-medium bg-gradient-to-r text-transparent bg-clip-text from-white to-gray-50" style="font-size: 25px;">ระบบสำรองที่นั่ง</p>

                    <div class="-mx-3 flex flex-wrap grow justify-center ">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-white">
                                    ชื่อ
                                </label>
                                <input type="text" name="name" id="name" placeholder="ชื่อ"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="tel" class="mb-3 block text-base font-medium text-white">
                                    เบอร์โทรศัพท์
                                </label>
                                <input type="text" name="tel" id="tel" placeholder="086xxxxxx" type="num" maxlength="10" minlength="10"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="guest" class="mb-3 block text-base font-medium text-white">
                            จำนวนที่นั่ง
                        </label>
                        <input type="number" name="guest" id="guest" placeholder="2" min="2" max="8" step="2"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>

                        <script>
                        document.getElementById("guest").addEventListener("input", function() {
                            var value = parseInt(this.value);
                            if (![2, 4, 6, 8].includes(value)) {
                                alert("กรุณากรอกขนาดตามที่กำหนด (2, 4, 6, 8)");
                                this.value = "";
                            }
                        });
                        </script>

                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="date" class="mb-3 block text-base font-medium text-white">
                                    วันที่
                                </label>
                                <input type="date" id="date" name="date"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="time" class="mb-3 block text-base font-medium text-white">
                                    เวลา
                                </label>
                                <select id="time" name="time" class=" w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280]" required>
                                    <option value="">เลือกเวลา</option>
                                    <option value="11.00">11:00</option>
                                    <option value="12.00">12:00</option>
                                    <option value="13.00">13:00</option>
                                    <option value="17.00">17:00</option>
                                    <option value="18.00">18:00</option>
                                    <option value="19.00">19:00</option>

                                  </select>
                            </div>
                        </div>
                    </div>


                    <div>
                        <button href="../maji.mp4" onclick="reservation();"
                            class="hover:shadow-form rounded-md bg-red-500 hover:bg-red-600 py-3 px-8 text-center text-white hover:scale-105 transition-transform duration-100">
                            จอง
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <video src="maji.mp4" autoplay loop muted class="w-full h-full object-cover" style="
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
      "></video>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script>
            function reservation() {
                var name = document.getElementById("name").value;
                var phone = document.getElementById("tel").value;
                var guest = document.getElementById("guest").value;
                var date = document.getElementById("date").value;
                var time = document.getElementById("time").value;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert('การจองเสร็จสิ้น')
                        window.location.reload();
                    }
                };

                xhttp.open("POST", "reservation.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("name=" + name + "&phone=" + phone + "&guest=" + guest + "&date=" + date + "&time=" + time);
            }
    </script>
    
</body>

</html>