<?php
  $msg = "";
  $msg2 = "";
  $css_class = "";

  $conn = mysqli_connect("localhost", "root", "", "project");

  // update user information when form is filled out
  if (isset($_POST['save_profile'])) {
    
    $bio = $_POST['bio'];
    $profileImageName = time().' '.$_FILES['profileImage']['name'];

    $target = 'images/' . $profileImageName;

    // image is successfully saved
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
      $sql = "INSERT INTO `user-info` (user.id, profile_img, bio) VALUES (19, $profileImageName', '$bio')";

      // image is successfully uploaded to database
      if(mysqli_query($conn, $sql)) {
        $msg2 = "image uploaded and saved";
        $css_class = "alert-success";
      }
      else{
        $msg2 = "image not uploaded and saved";
        $css_class = "alert-danger";
      }

      $msg = "Received {$_FILES['profileImage']['name']} - its size is {$_FILES['profileImage']['size']}";
      $css_class = "alert-success";
    } 
    
    else {
        $msg =  "Upload failed!";
        $css_class = "alert-danger";
    }
  }
?>