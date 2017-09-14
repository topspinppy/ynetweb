<?php
@ini_set('display_errors', '0');
?>

<?php session_start(); ?>
<?php include("connect.php"); ?>
<?php include("doctype_checklogin.php") ?>

    <?php
      $username = trim($_POST["user_id"]);
      $password = trim($_POST["password"]);
    ?>
    <?php
      $sql = "SELECT * FROM member WHERE username = '$username' and password = '$password'";
      $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
      $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

      $usernamequery = $result["username"];
      $passwordquery = $result["password"];
      if($usernamequery == $username && $passwordquery == $password && $result["verify"] == "0" && $result["type"] == "member")
      {
          echo "0"; // log in
          $_SESSION["username"] = $usernamequery;
          //  echo $result["username"] == $username && $result["password"] == $password;
      }
      else if ($usernamequery == $username && $passwordquery == $password && $result["verify"] == "0" && $result["type"] == "admin")
      {
          echo"1";
          $_SESSION["usernameadmin"] = $usernamequery;
      }
      else
      {
           echo "ไม่มี User อยู่ในระบบ";
      }
      mysqli_close($connect);
  ?>
