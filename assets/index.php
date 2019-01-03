<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/app.css">

    <title>Content Ignition</title>
  </head>
  <body>
    
    <?php require_once('views/navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php require_once('views/database-form.php'); ?>
            <?php require_once('views/records.php');?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./../assets/js/app.js"></script>
  </body>
</html>