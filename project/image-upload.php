<?php include_once('processForm.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        
        <form action="image-upload.php" method="post" enctype="multipart/form-data">
          <?php if(!empty($msg)): ?>
            <div class="alert <?php echo $css_class; ?>">
              <?php echo $msg; ?>
              <?php echo $msg2; ?>
            </div>
          <?php endif; ?>

          <div class="form-group text-center">
            <img src = "images/placeholder.jpg" onclick = "triggerClick()" id="profileDisplay"/>
            <label for="profileImage"> Profile Image </label>
            <input type="file" name="profileImage" onchange = "displayImage(this)" id="profileImage" class="form-control" style = "display: none">
          </div>
          <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>
</html>
