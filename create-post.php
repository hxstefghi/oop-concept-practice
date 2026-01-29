<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];


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
          <a href="./home.php">Home</a>
          <a href="#">Profile</a>
          <a href="#">Create Post</a>
          <a href="./logout.php">Logout</a>
        </div>
      </div>
    </nav>
  </header>

  <section class="py-6">
    <div class="max-w-2xl mx-auto">
      <h1 class="text-3xl font-bold">Create Post</h1>
      <div class="mt-4">
        <form action="./routes/create-post.php" method="POST">
          <div class="flex flex-col">
            <label for="title" class="mb-2">Title</label>
            <input type="text" name="title" id="title" placeholder="Post Title" class="py-2 px-3 outline-1 outline-gray-700 rounded-lg mb-4">
            <p class="text-red-500">
              <?php if (isset($_SESSION['errors']['title'])) {
                echo $_SESSION['errors']['title'];
              } ?>
            </p>

            <label for="body" class="mb-2">Body</label>
            <textarea name="body" id="body" placeholder="Post Body" class="px-3 py-2 outline-1 outline-gray-700 rounded-lg" rows="7"></textarea>
            <p class="text-red-500">
              <?php if (isset($_SESSION['errors']['body'])) {
                echo $_SESSION['errors']['body'];
              } ?>
            </p>

            <button class="px-3 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-white mt-4 cursor-pointer">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>