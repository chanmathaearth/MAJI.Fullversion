<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
</head>

<body>

      <div class="flex justify-center mt-[3%] bg-amber-400 p-4 text-nowrap rounded-t-3xl text-white p-2">
        รายการอาหารทั้งหมด
      </div>
      <div class="p-4 bg-amber-50 rounded-b-3xl">
        <div class="grid grid-cols-3 items-center text-l text-yellow-400 mb-4">
                <div>ชื่อเมนู</div>
                <div class="text-center">จำนวน</div>
            </div>
      <?php
        session_start();
        if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

            foreach ($_SESSION['basket'] as $index => $item) {
                $menuId = $item['menuId'];
                $menuName = $item['menuName'];
                $menuQuantity = $item['menuQuantity'];
        
                echo "<div class='grid grid-cols-3 items-center text-l text-yellow-900 mb-4 mt-5'>
                <div>$menuName</div>
                <div class='max-w-xs mx-auto'>
                    <div class='relative flex items-center'>
                        <span id='counter' class='m-2 flex-shrink-0 text-red-600 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center'>$menuQuantity</span>
                    </div>
                </div>
                <div>
                    <a href='removeMenuBasket.php?index=$index' class='text-red-400 hover:text-red-600 transition-transform duration-100'>ยกเลิก</a>
                </div>
            </div><hr>";
            }
          }
        ?>
        <div>
          <button onclick="window.location.href='addressInfo.php';" class="mt-2 mb-[2%] text-white bg-amber-400 hover:bg-amber-500 font-medium rounded-full text-sm px-5 py-2.5 text-center">
            ยืนยันการสั่งซื้อ
          </button>
        </div>
      </div>
</body>

</html