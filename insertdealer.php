<?php
session_start();
include 'db.php';
class Cryptor
{

  protected $method = 'AES-128-CTR'; // default
  private $key;

  protected function iv_bytes()
  {
    return openssl_cipher_iv_length($this->method);
  }

  public function __construct($key = false, $method = false)
  {
    if(!$key) {
      // if you don't supply your own key, this will be the default
      $key = gethostname() . "|" . ip2long($_SERVER['SERVER_ADDR']);
    }
    if(ctype_print($key)) {
      // convert key to binary format
      $this->key = openssl_digest($key, 'SHA256', true);
    } else {
      $this->key = $key;
    }
    if($method) {
      if(in_array($method, openssl_get_cipher_methods())) {
        $this->method = $method;
      } else {
        die(__METHOD__ . ": unrecognised encryption method: {$method}");
      }
    }
  }

  public function encrypt($data)
  {
    $iv = openssl_random_pseudo_bytes($this->iv_bytes());
    $encrypted_string = bin2hex($iv) . openssl_encrypt($data, $this->method, $this->key, 0, $iv);
    return $encrypted_string;
  }

  // decrypt encrypted string
  public function decrypt($data)
  {
    $iv_strlen = 2  * $this->iv_bytes();
    if(preg_match("/^(.{" . $iv_strlen . "})(.+)$/", $data, $regs)) {
      list(, $iv, $crypted_string) = $regs;
      $decrypted_string = openssl_decrypt($crypted_string, $this->method, $this->key, 0, hex2bin($iv));
      return $decrypted_string;
    } else {
      return false;
    }
  }

}
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$role = "dealers";

$company = mysqli_real_escape_string($conn, $_POST['company']);
$vat = mysqli_real_escape_string($conn, $_POST['vat']);
$pin=mysqli_real_escape_string($conn,$_POST['pin']);
$business_reg = mysqli_real_escape_string($conn, $_POST['business']);
$adress = mysqli_real_escape_string($conn, $_POST['adress']);

$encryption_key = 'KZ4LurHESC0Y8/Ufy1wsio6aaYXW7m7KVuW8NBKQhE5CnLspz+540p1ClhIZvKNx';
  $cryptor = new Cryptor($encryption_key);
  $encrypted_token = $cryptor->encrypt($password);
  $sql="INSERT INTO `users`(`firstname`, `secondname`, `email`, `position`, `number`, `branch`, `password`, `company`,`OTP`,`renewal`) VALUES('$firstname','$lastname','$email','$role','$number','$branch','$encrypted_token','$company','0','0')";
  $result=mysqli_query($conn,$sql) or die($conn);
  if ($result=== true) {
    # code...
    $query="SELECT * FROM `users` WHERE email='$email'";
    $query_insert= mysqli_query($conn,$query) or die($conn);
    $row=mysqli_fetch_array($query_insert);
    extract($row);
    $id=$row['id'];
    $sql="INSERT INTO `dealer_info`( `business_reg`, `pin_no`, `vat`, `dealer_id`,`address`) VALUES ('$business_reg','$pin','$vat','$id','$adress')";
    $result1=mysqli_query($conn,$sql);
    if ($result1=== true) {
      # code...
      header('location:dealer.php');
    } else {
      # code...
      echo "something is wrong sir";
    }
    
  } else {
    # code...
    echo "something is wrong";
  }
  ?>