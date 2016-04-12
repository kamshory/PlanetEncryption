<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data</title>
</head>

<body>

<?php
	$crypt = new PlanetEncryption('www.planetbiru.com');
	echo base64_encode($crypt->Encrypt('plain text'));
?>

</body>
</html>