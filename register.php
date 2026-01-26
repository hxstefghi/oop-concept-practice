<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

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
  <header class="py-6">
    <nav class="max-w-7xl mx-auto">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl">Logo</h1>

        <div class="space-x-6">
          <a href="#">Home</a>
          <a href="#">Profile</a>
          <a href="#">Create Post</a>
        </div>
      </div>
    </nav>
  </header>

  <section class="py-6">
    <div class="max-w-sm mx-auto">
      <h1 class="text-3xl mb-12 text-center">Register your account</h1>
      <form action="./routes/register.php" method="POST">
        <?php
        $attribute = [
          'label' => 'First Name',
          'type' => 'text',
          'id' => 'firstName'
        ];

        require("./components/input-field.php");
        ?>

        <?php
        $attribute = [
          'label' => 'Last Name',
          'type' => 'text',
          'id' => 'lastName'
        ];

        require("./components/input-field.php");
        ?>

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

        <?php
        $attribute = [
          'label' => 'Confirm Password',
          'type' => 'password',
          'id' => 'cpassword'
        ];

        require("./components/input-field.php");
        ?>

        <button class="px-3 py-2 bg-violet-700 hover:bg-violet-600 text-white rounded-md w-full mb-5 cursor-pointer">Register</button>
      </form>
      <p class="text-center">Already have an account? <span class="text-violet-700 font-bold underline">Login</span></p>
    </div>
  </section>
</body>

</html>