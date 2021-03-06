<?php
require '../db.php';
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

  
  $first=$_POST['Username'];
  $second=$_POST['second name'];
  $email=$_POST['email'];
  $pas=$_POST['password'];
  $token=$pas;
 $encryption_key = 'KZ4LurHESC0Y8/Ufy1wsio6aaYXW7m7KVuW8NBKQhE5CnLspz+540p1ClhIZvKNx';
  $cryptor = new Cryptor($encryption_key);
  $ecrypted_token = $cryptor->encrypt($token);
$sql="INSERT INTO `users`( `firstname`, `secondname`, `password`, `email`) VALUES('$first','$second','ecrypted_token','$email')";
$result =mysqli_query($conn,$sql);
if ($result===true) {
	# code...
	header('location:../index.php');
} else {
	# code...
	echo "error";
}

?>