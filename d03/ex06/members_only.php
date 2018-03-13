<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != "zaz" || $_SERVER['PHP_AUTH_PW'] != "jaimelespetitsponeys")
{
header('HTTP/1.0 401 Unauthorized');
header("WWW-Authenticate: Basic realm=''Espace membres''");
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
}
else
{
$img = file_get_contents("../img/42.png");
$img = base64_encode($img);
?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?php echo $img ?>'>
</body></html>
<?php
}
?>