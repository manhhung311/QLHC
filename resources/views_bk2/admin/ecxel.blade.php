<!DOCTYPE html>
<html>
<body>

<form action="ecxelupload" method="post" enctype="multipart/form-data">
@csrf
  Select image to upload:
  <input type="file" name="newfile" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>