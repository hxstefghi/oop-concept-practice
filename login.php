<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

// unset($_SESSION['errors']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

  <section class="py-12">
    <div class="max-w-sm mx-auto">
      <h1 class="text-3xl mb-12 text-center">Login to your account</h1>
      <form action="./routes/login.php" method="POST">

        <?php
        $attribute = [
          'label' => 'Email',
          'type' => 'email',
          'id' => 'email'
        ];

        require("./components/input-field.php");
        ?>

        <?php
        $attribute = [
          'label' => 'Password',
          'type' => 'password',
          'id' => 'password'
        ];

        require("./components/input-field.php");
        ?>

        <button class="px-3 py-2 mt-2 bg-violet-700 hover:bg-violet-600 text-white rounded-md w-full mb-5 cursor-pointer">Login</button>
      </form>
      <p class="text-center">Don't have an account?
        <a href="./register.php">
          <span class="text-violet-700 font-bold underline">Register</span>
        </a>
      </p>
    </div>
  </section>
</body>

</html>