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
     $username=mysqli_real_escape_string ( $conn, $_POST ['uname']);
	$password = mysqli_real_escape_string ( $conn, $_POST ['password']);
      $sql=" SELECT * FROM ntsa where user='$username' ";
      $result = mysqli_query ( $conn ,$sql ) or die(mysqli_error($conn));
$row = mysqli_fetch_array ($result);
 
if (mysqli_num_rows ($result) > 0) 
{
	$encryption_key = 'KZ4LurHESC0Y8/Ufy1wsio6aaYXW7m7KVuW8NBKQhE5CnLspz+540p1ClhIZvKNx';
	$cryptor = new Cryptor($encryption_key);
	$decrypted_token = $cryptor->decrypt($row['password']);
	
	if(strcmp($decrypted_token, $password) === 0)
	{
	$_SESSION['last'] = $row['user'];
  $_SESSION['id']=$row['id'];
  $_SESSION['company']="jendie";
	$user=$row['name'];
  $_SESSION['james']=$username;
	header('location:search/');	
	}
	else
	{
		 echo "Your Login password is invalid" ;
	}

}
else 
{
 echo "Your Login Name is invalid" ;
}
?>