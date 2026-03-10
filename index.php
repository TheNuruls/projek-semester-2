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
<title>Note App</title>
</head>

<body>
  <div class="max-w-[490px] mx-auto mt-[100px] px-6">
    <!-- // top section -->
    <div class="flex flex-col">
      <span class="self-center p-2 px-3 rounded mx-auto bg-[#F2EBFD]"><i class="hgi hgi-stroke hgi-task-edit-01"></i></span>
      <h1 class="text-center fs-4xl text-[32px] font-bold">Welcome Back</h1>
      <p class="text-center max-w-[300px] mx-auto">Please sign in to continue managing your notes and ideas.</p>
    </div>

    <!-- // form section -->
    <form action="./main.php" method="post" class="flex flex-col gap-4 mt-6">
        <div class="flex flex-col gap-2">
          <label for="email">Email</label>
          <input type="email" name="input_email" id="email" class="p-2 bg-[#f8fafc] rounded border border-[#9DABBE]" placeholder="Enter your email">
        </div>
        <div class="flex flex-col gap-2">
          <label for="password">Password</label>
          <input type="password" name="input_password" id="password" class="p-2 bg-[#f8fafc] rounded border border-[#9DABBE]" placeholder="Enter your password">
        </div>

        <a href="./forgot-password.php" class="self-end text-[#7C3AED]">Forgot password?</a>

        <button type="submit" class="bg-[#7C3AED] text-white font-bold p-2 mt-4 hover:bg-[#6b21a8] transition shadow-lg rounded">Sign In</button>
      </form>

      <!-- // bottom section -->
      <p class="text-center mt-6">Don't have an account? <a href="./register.php" class="text-[#7C3AED] font-bold">Register</a></p>
  </div>

</body>

</html>