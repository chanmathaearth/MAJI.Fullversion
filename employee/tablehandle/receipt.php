<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จชำระเงิน</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

    </style>
</head>

<body class="bg-white" style="
          font-family: Prompt, sans-serif;
          font-weight: 300;
          font-style: normal;
        ">
        <div class="flex justify-center"><button onclick="openModal()" class="rounded-full text-center bg-red-500 text-white p-4">Show</button></div>
    

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="w-[32%] mx-auto p-26">

                <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
                    <div class="text-right font-size">
                    <button>                    <span class="text-black hover:text-red-400 text-[20px] mt-[-2%]" onclick="closeModal()">&times;</span>
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
                                <path fill-rule="evenodd" d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5c0 1.1.9 2 2 2h1v-4c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4c0 .6-.4 1-1 1H9Z" clip-rule="evenodd"/>
                            </svg>
                            
                        </button>
                    </div>

        
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
</body>

</html>