<?php
session_start();
require 'db.php';
require 'auth.php'
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>JENDIE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400'>
<style type="text/css">
	.button {
  display: inline-block;
  margin: 0.75rem;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 0.1875rem;
  outline: none;
  background-color: tomato;
  color: white;
  font-family: inherit;
  font-size: 1.25em;
  font-weight: 400;
  line-height: 1.5rem;
  text-decoration: none;
  text-align: center;
  cursor: pointer;
  transition: all 150ms ease-out;
}
.button:focus, .button:hover {
  background-color: #ff7359;
  box-shadow: 0 0 0 0.1875rem white, 0 0 0 0.375rem #ff7359;
}
.button:active {
  background-color: #f25e43;
  box-shadow: 0 0 0 0.1875rem #f25e43, 0 0 0 0.375rem #f25e43;
  transition-duration: 75ms;
}
.button.is-outlined {
  border: 0.1875rem solid tomato;
  background-color: transparent;
  color: tomato;
}
.button.is-outlined:focus, .button.is-outlined:hover {
  border-color: #ff7359;
  color: #ff7359;
}
.button.is-outlined:active {
  border-color: #f25e43;
  color: #f25e43;
}

*, *::before, *::after {
  box-sizing: border-box;
}

html {
  background-color: #fafafa;
  font-family: Roboto, sans-serif;
}

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  width: 100%;
}

body {
  align-items: center;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
}
</style>
<script type="text/javascript">
	document.querySelector('.button').addEventListener('click', function (event) {
	event.preventDefault();
});
</script>
</head>
<body>
<!-- partial:index.partial.html -->

<a class="button" href="index-1.php">CERTIFICATES</a>


<a class="button is-outlined" href="accounts.php">ACCOUNTS</a>
<a class="button" href="admin_cancel.php">Cancel</a>
<!-- partial -->
  

</body>
</html>