<?php
// Check if form has been submitted
if(isset($_POST['submit'])){
  // Get file information from $_FILES array
  $file = $_FILES['file'];
  
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  // Get the file extension
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  // List of allowed file extensions
  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  // Check if the file extension is allowed
  if (in_array($fileActualExt, $allowed)) {
    // Check for any errors during the upload
    if ($fileError === 0) {
      // Check if the file size is within limits
      if ($fileSize < 1000000) {
        // Generate a unique file name
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        // Define the destination folder and file name
        $fileDestination = 'uploads/'.$fileNameNew;
        // Move the uploaded file to the destination folder
        move_uploaded_file($fileTmpName, $fileDestination);
        // Redirect to index page with success message
        header("Location: index.php?uploadsuccess");
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
}
?>

<!-- HTML form to select and upload a file -->
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit">Upload</button>
</form>
