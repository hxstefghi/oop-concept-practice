<?php

require_once("./controllers/Database.php");
require_once("./controllers/Post.php");

$postObj = new controllers\Post();
$posts = $postObj->getAllPosts();

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
          <a href="#">Home</a>
          <a href="#">Profile</a>
          <a href="./create-post.php">Create Post</a>
          <a href="./logout.php">Logout</a>
        </div>
      </div>
    </nav>
  </header>

  <section class="py-6">
    <div class="max-w-xl mx-auto">
      <h1 class="text-3xl font-bold">Timeline</h1>
      <div class="mt-4">

        <?php foreach ($posts as $post) { ?>

          <p class="font-light">
            <?php echo $post['first_name'] ?>
          </p>

          <p class="mb-2">
            <?php echo $post['content'] ?>
          </p>

        <?php } ?>

        <!-- <p><span class="font-bold">ID: </span> <?php // echo $user['id']  
                                                    ?> </p>
        <p><span class="font-bold">Name: </span> <?php // echo $user['first_name'] . " " . $user['last_name'] 
                                                  ?> </p>
        <p><span class="font-bold">Email: </span> <?php // echo $user['email'] 
                                                  ?> </p> -->

      </div>
    </div>
  </section>

</body>

</html>