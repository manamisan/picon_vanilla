<?php
require_once('./actions/controller.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Picon</title>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="./assets/js/jquery.js"></script>

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <script src="./assets/js/script.js"></script>
  
</head>

<body class="bg-gray-100">

  <div class="mb-2 py-3 md:px-10 bg-gradient-to-r from-pink-300 to-purple-300">
    <div class="mx-3">
      <h2 class="h2 mx-auto">Picon <span class="h6 text-muted text-white-500">- picture converter</span></h2>
    </div>

  </div>

  <main class="md:container mx-auto p-3">
    <!-- <img src="./assets/images/guitar.png" alt=""> -->
    <p class="h6">Resolution : <?= $resolution ?> dpi</p>

    <?php if (!isset($error)) : ?>
      <!-- <form action="" method="post"> -->
      <!-- 送信ボタン -->
      <p class="h6 my-3"><?= $new_name ?> was created successfully!</p>
      <!-- <input name="new_name" type="hidden" value="<?= $new_name ?>"> -->
      <!-- <button name="download" class="btn btn-primary">Download</button> -->
      <!-- </form> -->
      <a class="btn btn-primary" href="./actions/download.php<?= '?new_name=' . $new_name . '&ext=' . $ext ?>">Download</a>
    <?php else : ?>
      <p class="h6 my-3"><span class="text-red-500">ERROR! </span><?= $new_name ?> couldn't be created...</p>
    <?php endif ?>
    <a class="btn btn-secondary" href="./index.php">戻る</a>
  </main>

</body>

</html>