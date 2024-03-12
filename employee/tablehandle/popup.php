<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fixed z-50" style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">

    <?php $tableName = $_GET['tableName']; ?>
    <div class="fixed inset-0 z-50">

        <div class="fixed justify-center items-center md:inset-0 w-[30%] mx-auto text-center">
            <div class="bg-white  rounded-3xl shadow-xl shadow-white-800/40 ">
                <img src="logo.png" width="130px" height="100px" class="mx-auto">
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-2xl leading-relaxed text-black">ยืนยันการเช็คอินโต๊ะ</p>
                    <p id="tableName" class="text-3xl leading-relaxed text-black"> <?php echo $tableName; ?> </p>
                </div>
                <div class="p-4 flex justify-center items-center ">
                    <button data-modal-hide="default-modal" id="confirmButton" type="button" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-green-500 mr-4" onclick="confirm()">ยืนยัน</button>
                    <button data-modal-hide="default-modal" type="button" class="text-white bg-red-500 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-red-500" onclick="cancel()">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>

</body>

</html>