<?php
 parse_str(parse_url($_SERVER['REQUEST_URI'],
					 PHP_URL_QUERY), $query);
 require_once('Core/routes.php');
 $keys = (array_keys($query));
?>

<?xml version="1.0" encoding="UTF-8"?>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css" />
    <title>Portfolio</title>
</head>
<body>
 <div id="main">
	  <?php
		route($keys[0], $query);
	   ?>
 </div>
</body>
</html>