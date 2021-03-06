<?php
session_start();
require 'auth.php';
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>JENDIE</title>
  
<style>
  

@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic);
html, body {
  font-family: "Open Sans", sans-serif;
  -webkit-font-smoothing: subpixel-antialiased;
}

.container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 1;
 }
.container .box#sign-up {
  box-sizing: border-box;
  width: 440px;
  margin: 40px auto;
  background-color:#313335;
  border-radius: 2px;
  box-shadow: 0 1px 20px 5px rgba(0, 0, 0, 0.4);
  padding: 15px 35px;
}
.container .box#sign-up .back {
  text-decoration: none;
  line-height: 40px;
}
.container .box#sign-up .back .back-arrow {
  color: #777;
}
.container .box#sign-up .brand .logo {
  position: relative;
  width: 65px;
  height: 60px;
  margin: 0 auto;
}
.container .box#sign-up .brand .logo .square {
  position: absolute;
  left: 9px;

  width: 40px;
  height: 40px;
  border: 3px solid #3498db;
  border-radius: 8px;
  transform: rotateX(55deg) rotateZ(45deg);
  box-shadow: 3px 3px 0px 2px white;
  -webkit-backface-visibility: hidden;
}
.container .box#sign-up .brand .logo .square:nth-of-type(1) {
  background: #3498db;
  top: 0;
  z-index: 99;
}
.container .box#sign-up .brand .logo .square:nth-of-type(2) {
  top: 12px;
  z-index: 98;
}
.container .box#sign-up .brand .logo .square:nth-of-type(3) {
  top: 24px;
  z-index: 97;
}
.container .box#sign-up .brand .title {
  font-weight: 400;
  color: #333;
  text-align: center;
}
.container .box#sign-up .form input {
  outline: 0;
  border: 1px solid #CCC;
  box-sizing: border-box;
  padding: 18px;
  color: #222;
  border-radius: 4px;
  width: 100%;
  margin: 5px 0;
  font-weight: 600;
}
.container .box#sign-up .form input::-webkit-input-placeholder {
  color: #AAA;
  font-weight: 400;
}
.container .box#sign-up .form .row input {
  width: calc(50% - 5px);
  float: left;
}
.container .box#sign-up .form .row input:first-of-type {
  margin-right: 10px;
}
.container .box#sign-up .form .checkbox {
  margin: 5px 0;
}
.container .box#sign-up .form .checkbox .checkbox-label {
  position: relative;
  display: table;
  width: 16px;
  height: 16px;
  background: white;
  border: 1px solid #CCC;
  border-radius: 2px;
  float: left;
  margin: 5px 5px 5px 0;
}
.container .box#sign-up .form .checkbox input[type="checkbox"] {
  display: none;
}
.container .box#sign-up .form .checkbox input[type="checkbox"]:checked ~ label.checkbox-label:before {
  content: "";
  position: absolute;
  top: 7px;
  left: 5px;
  height: 3px;
  width: 10px;
  background: #3498db;
  transform: rotate(-45deg);
}
.container .box#sign-up .form .checkbox input[type="checkbox"]:checked ~ label.checkbox-label:after {
  content: "";
  position: absolute;
  top: 5px;
  left: 3px;
  height: 6px;
  width: 3px;
  background: #3498db;
  transform: rotate(-45deg);
}
.container .box#sign-up .form .checkbox label.description {
  float: left;
  margin: 3px 0;
  color: #333;
}
.container .box#sign-up .form .checkbox label.description a {
  text-decoration: none;
  color: #5AA4EC;
  font-weight: 600;
}
.container .box#sign-up .form button {
  width: 100%;
  background: #3498db;
  line-height: 40px;
  border: 0;
  outline: 0;
  color: white;
  border-radius: 20px;
  font-weight: 300;
  margin-top: 15px;
  margin-bottom: 50px;
}



</style>
  

  
</head>

<body>

  <div class="container">
  <div class="box" id="sign-up">
    <div class="brand">
    
      
    </div>
    <div class="form">
      <form action="insertpulse.php" method="post">
        
         <div class="row">
          <input type="text" name="company"  placeholder="MAKE" required/>
        <input type="text" name="email"  placeholder="MODEL" required/>
         </div>
       
        <input type="text" name="number"  placeholder="PULSE"required/>

        
             <br/>
         
        
        <button type="submit" name="submit">ADD </button>
      </form>
    
</div>
  
  

</body>

</html>

