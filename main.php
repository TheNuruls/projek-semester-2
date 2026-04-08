<?php
   include "./config.php";

   $query = "SELECT * FROM notes";

   //jalankan query
   $result = $conn->query($query);

   // echo "jumlah data: ";
   // echo $result->num_rows;
   // echo "<br /> <br />";

   $row = $result->fetch_all();

   // echo "<pre />";
   // print_r($row);

   //echo $riw [0][1];
   // exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />
  <style>
    * {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<title>Login</title>
</head>

<body>
  <div class="max-w-[490px] mx-auto mt-[100px] px-6">
    <!-- // top section -->
    <div class="flex flex-col">
      <h1 class="fs-4xl text-[32px] font-bold">My Notes</h1>
    </div>

    <!-- // form search section -->
    <form action="./index.php" method="post" class="flex flex-col gap-4 mt-6">
      <div class="flex flex-col gap-2 relative">
        <label for="fullname" class="absolute flex top-2 left-3 text-[#9DABBE]"><i class="hgi hgi-stroke hgi-search-01"></i></label>
        <input type="text" name="fullname" id="fullname" class="p-2 bg-[#f8fafc] rounded border border-[#9DABBE] pl-10" placeholder="Search notes...">
      </div>
    </form>

    <!-- // notes section -->
    <div class="flex flex-col pt-5">
      <h2 class="uppercase text-[#9DABBE] font-bold">Recent</h2>

      <!-- notes holder -->
      <div class="flex flex-col top-5 gap-5">
        
        <?php for ($i = 0; $i < $result->num_rows; $i++): ?>
          <a href="./edit.php">
            <div class="flex flex-col p-[20px] shadow-lg rounded-lg gap-2">
              <h3 class="text-lg font-bold"> <?php echo $row[$i][1]; ?> </h3>
              <p class="text-[#666D7C]"><?php echo $row[$i][2] ?> </p>
              <span class="text-[#9DABBE]"> <?php echo $row[$i][3] ?></span>
            </div>
          </a>
        <?php endfor; ?>
      </div>
    </div>

    <!-- // floating button -->
    <a href="./create.php" class="fixed bottom-10 right-10 w-[50px] h-[50px] bg-[#7C3AED] flex items-center justify-center text-white font-bold text-2xl rounded-full shadow-lg">
       <i class="hgi hgi-stroke hgi-add-01"></i>
    </a>

  </div>

</body>

</html>