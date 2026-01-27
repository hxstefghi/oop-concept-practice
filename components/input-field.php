<label for="<?php echo $attribute['id'] ?>"><?php echo $attribute['label'] ?></label>
<br>
<input type="<?php echo $attribute['type'] ?>" name="<?php echo $attribute['id'] ?>" id="<?php echo $attribute['id'] ?>" placeholder="<?php echo $attribute['label'] ?>" class="px-3 py-2 outline-1 outline-gray-800 rounded-md focus:outline-2 mt-2 w-full">

<p class="text-red-500 mt-1 mb-3">
  <?php
  if (isset($_SESSION['errors'])) {
    echo $errors[$attribute['id']];
  }
  ?>
</p>