<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/assets/css/style.php?base=su&page=installation">
    <title>Welcome- Setup of <?php echo $appname; ?></title>
  </head>
  <body class=''>
    <div class='bg'>
      <div class='topleft'><?php echo $appname; ?></div>
      <div class='middle' id='insideboxinstall'>
        <h1>Welcome</h1>
        <hr>
        <button onclick='runsetup(<?php echo $setpage?>)'>Start Setup</button>
      </div>
    </div>
    <script src='/admin/assets/js/app.php?base=su&page=installation"'></script>
  </body>
</html>