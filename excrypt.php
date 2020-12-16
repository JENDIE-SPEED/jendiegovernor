<?php
/**
 * http://stackoverflow.com/questions/9262109/php-simplest-two-way-encryption/30189841#30189841
 * 
 * This is not safe to use
 */
   /* class UnsafeCrypto
    {
        const METHOD = 'aes-256-ctr';
        
        /**
         * Encrypts (but does not authenticate) a message
         * 
         * @param string $message - plaintext message
         * @param string $key - encryption key (raw binary expected)
         * @param boolean $encode - set to TRUE to return a base64-encoded 
         * @return string (raw binary)
         */
        /*public static function encrypt($message, $key, $encode = false)
        {
            $nonceSize = openssl_cipher_iv_length(self::METHOD);
            $nonce = openssl_random_pseudo_bytes($nonceSize);
            
            $ciphertext = openssl_encrypt(
                $message,
                self::METHOD,
                $key,
                OPENSSL_RAW_DATA,
                $nonce
            );
            
            // Now let's pack the IV and the ciphertext together
            // Naively, we can just concatenate
            if ($encode) {
                return base64_encode($nonce.$ciphertext);
            }
            return $nonce.$ciphertext;
        }
        
        /**
         * Decrypts (but does not verify) a message
         * 
         * @param string $message - ciphertext message
         * @param string $key - encryption key (raw binary expected)
         * @param boolean $encoded - are we expecting an encoded string?
         * @return string
         */
       /* public static function decrypt($message, $key, $encoded = false)
        {
            if ($encoded) {
                $message = base64_decode($message, true);
                if ($message === false) {
                    throw new Exception('Encryption failure');
                }
            }

            $nonceSize = openssl_cipher_iv_length(self::METHOD);
            $nonce = mb_substr($message, 0, $nonceSize, '8bit');
            $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
            
            $plaintext = openssl_decrypt(
                $ciphertext,
                self::METHOD,
                $key,
                OPENSSL_RAW_DATA,
                $nonce
            );
            
            return $plaintext;
        }
    }*/
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


//$message = 'hey rap.';
//$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');

//$encrypted = UnsafeCrypto::encrypt($message, $key);
//$decrypted = UnsafeCrypto::decrypt($encrypted, $key);


//var_dump($encrypted, $decrypted);
//echo $decrypted."\n";

//echo $encrypted;

$token = "62b0d0d9b4187e781df208f3a7f6385db+OW97aMT4MIjg==";
  $encryption_key = 'KZ4LurHESC0Y8/Ufy1wsio6aaYXW7m7KVuW8NBKQhE5CnLspz+540p1ClhIZvKNx';
  $cryptor = new Cryptor($encryption_key);
  $crypted_token = $cryptor->decrypt($token);
  unset($token);
echo $crypted_token;
echo "\n";