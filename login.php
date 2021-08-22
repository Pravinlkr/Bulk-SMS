<?php 
include 'components/header.php'; 
include 'database/dbconnection.php';
$message = '';
if(isset($_SESSION["username"])){
header("Location: index.php");
exit(); }



function encrypt_decrypt($string, $action = 'encrypt')
  {
      $encrypt_method = "AES-256-CBC";
      $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
      $secret_iv = '5fgf5HJ5g27'; // user define secret key
      $key = hash('sha256', $secret_key);
      $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
      if ($action == 'encrypt') {
          $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
          $output = base64_encode($output);
      } else if ($action == 'decrypt') {
          $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
      }
      return $output;
  }

    //echo "Your Encrypted password is = ". $pwd = encrypt_decrypt('admin', 'encrypt');
      $pwd = 'VW1BM3dEOFlBOEpzZC8xUXdlVzIzdz09Y';
      //echo "Your Decrypted password is = ". encrypt_decrypt($pwd, 'decrypt');


if(isset($_POST['login'])){
  $username = stripslashes($_POST['username']);
  $username = trim($username,'');
  $password = stripslashes($_POST['password']);
  $password = trim($password,'');
  if(strlen($username) > 0 && strlen($password) > 0){
  $pass = '';
  $query = "SELECT * FROM `admin` WHERE `username` = '$username'";

  $result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
  if($rows == 1){
    $data = mysqli_fetch_assoc($result);
    $pass = encrypt_decrypt($data['password'], 'decrypt');
    $dbusername = $data['username'];
    if($pass == $password && $dbusername == $username){
      $_SESSION['username'] = $username;
      header("Location: index.php");
    }
    else{
      $message = 'Invalid username or password, Please Try Again';
    }
  }else{
    $message = 'User Does not Exist';
  }
 
} else{
  $message = 'Both Fields Are Required';
}
}


?>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <div class="formBox" style="margin-top:20%;">
                <h5>Login</h5>
                <hr />
                <form method="post" action=""> 
                  <div class="form-group">
                    <label for="inputUser">Username*</label>
                    <input type="text" name="username" class="form-control" id="inputUser">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password*</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                  </div>
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <p style="color:red;"><?php echo $message; ?></p>
                </form>
              </div>
            </div>
            <div class="col-sm-4"></div>
          </div>
		    </div>
		</div>
<?php include 'components/footer.php'; ?>
		