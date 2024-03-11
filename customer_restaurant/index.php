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
            background-color: rgba(0, 0, 0, 0.077);
            backdrop-filter: blur(12px);
        }

        .type {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: 0.10em;
            animation: typing 8s steps(1200, end) infinite;
        }

        /* The typing effect */
        @keyframes typing {
            0% {
                opacity: 0;
                width: 0;
            }

            25% {
                opacity: 1;
                width: 100%;
            }

            50% {
                opacity: 1;
                width: 100%;
            }

            80% {
                opacity: 1;
                width: 100%;
            }

            100% {
                opacity: 0;
                width: 100%;
            }
        }
    </style>
</head>


<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    
    <audio autoplay loop controls class= "hidden p-5 flex justify-center items-center absolute inset-0 z-50 h-screen" style="width: 10%;">
        <source src="../assets/audio.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <div>
        <form class="flex justify-center items-center absolute inset-0 z-30 animate-pulse scale-110 top-[-60%]">
            <div class="fixed">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 ">
                    <svg class="w-5 h-5 text-gray-500" fill="#FFFFFF" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 44.999 44.999" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M42.558,23.378l2.406-10.92c0.18-0.816-0.336-1.624-1.152-1.803c-0.816-0.182-1.623,0.335-1.802,1.151l-2.145,9.733 h-9.647c-0.835,0-1.512,0.677-1.512,1.513c0,0.836,0.677,1.513,1.512,1.513h0.573l-3.258,7.713 c-0.325,0.771,0.034,1.657,0.805,1.982c0.19,0.081,0.392,0.12,0.588,0.12c0.59,0,1.15-0.348,1.394-0.925l2.974-7.038l4.717,0.001 l2.971,7.037c0.327,0.77,1.215,1.127,1.982,0.805c0.77-0.325,1.13-1.212,0.805-1.982l-3.257-7.713h0.573 C41.791,24.564,42.403,24.072,42.558,23.378z">
                                    </path>
                                    <path
                                        d="M14.208,24.564h0.573c0.835,0,1.512-0.677,1.512-1.513c0-0.836-0.677-1.513-1.512-1.513H5.134L2.99,11.806 C2.809,10.99,2,10.472,1.188,10.655c-0.815,0.179-1.332,0.987-1.152,1.803l2.406,10.92c0.153,0.693,0.767,1.187,1.477,1.187h0.573 L1.234,32.28c-0.325,0.77,0.035,1.655,0.805,1.98c0.768,0.324,1.656-0.036,1.982-0.805l2.971-7.037l4.717-0.001l2.972,7.038 c0.244,0.577,0.804,0.925,1.394,0.925c0.196,0,0.396-0.039,0.588-0.12c0.77-0.325,1.13-1.212,0.805-1.98L14.208,24.564z">
                                    </path>
                                    <path
                                        d="M24.862,31.353h-0.852V18.308h8.13c0.835,0,1.513-0.677,1.513-1.512s-0.678-1.513-1.513-1.513H12.856 c-0.835,0-1.513,0.678-1.513,1.513c0,0.834,0.678,1.512,1.513,1.512h8.13v13.045h-0.852c-0.835,0-1.512,0.679-1.512,1.514 s0.677,1.513,1.512,1.513h4.728c0.837,0,1.514-0.678,1.514-1.513S25.699,31.353,24.862,31.353z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <input id="tableId" name="search"
    class="mr-6  text-white block w-full p-4 ps-10 text-sm text-gray-900 border-b-2 border-red-500 rounded-xl bg-black shadow-lg shadow-red-500/50"
    placeholder="กรุณากรอกเลขที่นั่งโต๊ะ" required />

            <button type="button" onclick="searchTable()"
                class="fixed text-white absolute end-2.5 bottom-2.5 hover:text-red-500 transition-transform duration-100 font-medium rounded-lg text-sm px-4 py-2">ตกลง</button>
            </div>
        </form>
    </div>
    <div class="text-white text-center z-20 absolute inset-0 flex justify-center items-center shadow-red-500/50">
        <p
            class="type max-[640px]:text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl bg-gradient-to-r text-center bg-gradient-to-r text-transparent bg-clip-text from-red-200 to-red-400 ">
            ยินดีต้อนรับสู่<br /><span class="sm:text-7xl md:text-9xl lg:text-11xl xl:text-13xl">มาจิ
            </span>
        </p>
    </div>
    <div class="hidden ad-container z-20 fixed bottom-0 left-0 p-2 flex w-60 justify-center items-center">
        <img src="https://s3-media0.fl.yelpcdn.com/bphoto/HiUJZXKPenv8vUw8o_e7zA/1000s.jpg" alt="Example Ad" class="rounded-3xl">
        <p class="ad-caption"></p>
    </div>



    <video src="/assets/maji.mp4" autoplay loop muted class="w-full h-full object-cover" style="
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
    function searchTable() {
        const tableId = document.getElementById('tableId').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'sessionTableId.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var result = xhr.responseText.trim();
                    console.log(result);
                    if (result == 'false') {
                        alert("กรุณากรอกเลขโต๊ะใหม่");
                        location.reload();
                        return;
                    }
                    window.location.href = "fullMenu.php";
                }
            }
        };
        xhr.send('tableId=' + tableId);
    }
</script>

</body>

</html>