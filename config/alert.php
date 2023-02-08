
<!DOCTYPE html>
<html lang="en">
<body>
<?php
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    echo "<script> alert('$error') </script>";
} else if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    echo "<script> alert('$success') </script>";
}
?>  
</body>
</html>

