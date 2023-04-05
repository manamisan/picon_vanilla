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

    <!-- （1）formタグにenctype="multipart/form-data"を記載 -->
    <form action="./download.php" method="post" enctype="multipart/form-data">
      <div class="row mb-4">
        <div class="col">
          <input type="file" name="picture" id="media" class="form-control" accept="image/*,application/pdf" aria-describedby="media-info" required>

          <div class="form-text" id="media-info">
            Acceptable image formats: eps, gif, jpeg, jpg, png, pdf, tif, tiff only <br>
            Maximum image file size: 1048KB <br>
            <!-- <br>
            Acceptable video formats: mp4 only <br>
            Maximum video file size: 8MB (~10 seconds)<br> -->
          </div>
        </div>
      </div>

      <!-- preview -->
      <div class="row mb-4" id="preview"></div>

      <div class="row mb-4" id="pdf_page" style="display: none;">
        <div class="col">
          <label for="resolution" class="form-label">Page</label>

          <input type="number" name="page" id="page" class="form-control" value="1" required>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="resolution" class="form-label">Resolution</label>
          <div class="input-group">
            <input type="number" name="resolution" id="resolution" class="form-control" value="100" required>
            <span class="input-group-text">dpi (dots per inch)</span>
          </div>
        </div>
      </div>

      <div class="row mb-4" id="convert" style="display: none;">
        <?php foreach ($mimes as $mime) : ?>
          <div class="col">
            <button name="into_<?= $mime ?>" class="btn btn-primary">.<?= $mime ?></button>
          </div>
        <?php endforeach; ?>
      </div>
    </form>
  </main>

</body>

</html>