<?php
session_start();
$pid = "";
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}
?>
<html>

<head>
    <title>Página</title>
    <link rel="icon" type="image/png" href="<?php echo $pid.'/img/logo.png' ?>" />
</head>

<body>
    <iframe src="<?php echo $pid ?>" width="100%" height="100%" ></iframe>
</body>

</html>