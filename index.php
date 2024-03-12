<!DOCTYPE html>
<html lang="th">

<head>
	<meta charset="UTF-8">
	<script src="https://cdn.tailwindcss.com"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เข้าสู่ระบบ</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap"
		rel="stylesheet" />
	<style>
		html {
			scroll-behavior: smooth;
		}

		.h {
			background-image: url('https://images.pexels.com/photos/2098085/pexels-photo-2098085.jpeg?cs=srgb&dl=pexels-rajesh-tp-2098085.jpg&fm=jpg');
			background-repeat: no-repeat;
			background-position: 10%;
			backdrop-filter: blur(20px);
			position: fixed;
			top: 0;
			left: 0;
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;
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

	<div class="h backdrop-blur-lg flex justify-center items-center h-screen bg-neutral-600 z-30 ">
		<section class="gradient-form h-full ">
			<div class="container h-full p-10 ">
				<div
					class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200 ">
					<div class="w-full">
						<div class="block rounded-lg bg-neutral-800 shadow-lg ">
							<div class="g-0 lg:flex lg:flex-wrap">
								<div class="px-4 md:px-0 lg:w-6/12">
									<div class="md:mx-6 md:p-12">
										<div class="text-center animate-pulse">
											<img class="mx-auto w-48" src="logo.png" alt="logo" />
										</div>
										<form id="myForm">
											<div class="mb-5">
												<label for="email"
													class=" block mb-2 text-sm font-medium text-white">อีเมลของคุณ</label>
												<input type="email" name="email" id="email"
													class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
													placeholder="example@gmail.com" required>
											</div>
											<div class="mb-5">
												<label for="password"
													class="block mb-2 text-sm font-medium text-white">รหัสผ่าน</label>
												<input type="password" name="password" id="password"
													placeholder="รหัสผ่าน"
													class="text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
													required>
											</div>
											<button type="button" onclick="submitFormCheckAccount()"
												class="mb-6 w-full text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">เข้าสู่ระบบ</button>
											<p class="text-sm font-light text-gray-500">
												ยังไม่มีบัญชี? <a href="signup/signup.html"
													class="font-medium text-primary-600 hover:underline">ลงทะเบียน</a>
											</p>
										</form>
									</div>
								</div>

								<div class="relative flex justify-center items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none animate-pulse max-[767px]:mt-10"
									style="backdrop-filter: blur(50px); background-image: url('https://pg.world/upl/ckeditor4_files/904e4e9ce648ba13dcab83feceb3c4e2.jpeg');">
									<div class="px-4 py-6 text-white md:mx-6 md:p-12">
										<h4 class="mb-2 text-xl font-semibold">
											เปิดประสบการณ์ใหม่
										</h4>
										<p class="text-sm">
											ด้วยความพิถีพิถันในการเสิร์ฟอาหารที่เต็มไปด้วยรสชาติและความอร่อยของญี่ปุ่นที่แท้จริง
											เราเปิดโอกาสให้คุณได้สัมผัสประสบการณ์ใหม่โดยไม่มีขีดจำกัด
											ทุกมื้อนั้นเป็นการเดินทางสู่ความอร่อยและความพึงพอใจที่ไม่เคยลืมไป
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

</body>

<script>
    function submitFormCheckAccount() {
        var form = document.getElementById('myForm');
        var email = form.elements['email'].value;
        var password = form.elements['password'].value;
		if (email.trim() !== "" && password.trim() !== "") {
			checkForm(email, password);
		}
		else{
			alert('โปรดกรอกข้อมูลให้ครบถ้วน')
		}
    }

    function checkForm(email, password) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'checkAccount.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim();
				alert(result)
                console.log(result);

                if (result === "chef") {
                    window.location.href = 'chef/manageorder.php';  // Redirect to home.php
                }
				else if (result === "employee") {
					window.location.href = 'employee/dashboard/index.php';  // Redirect to home.php
				}
				else if (result === "customer") {
                    window.location.href = 'customer_delivery/home/index.php';
                }
            }
        };
        xhr.send('email=' + email + '&password=' + password);
    }

</script>

</html>