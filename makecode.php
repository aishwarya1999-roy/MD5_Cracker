<?php
$error = false;
$md5 = false;
$pin = "";
if ( isset($_GET['pin']) ) {
    $pin = $_GET['pin'];
    if ( strlen($pin) != 4 ) {
        $error = "Input must be exactly four digits";
    } else if ( $pin[0] < "0" || $pin[0] > "9" ||
                $pin[1] < "0" || $pin[1] > "9" ||
                $pin[2] < "0" || $pin[2] > "9" ||
                $pin[3] < "0" || $pin[3] > "9") {
        $error = "Input must four digits letters";
    } else {
        $md5 = hash('md5', $pin);
    }
}
?>
<!DOCTYPE html>
<head><title>Aishwarya Roy PIN Maker</title></head>
<body>
<h1>MD5 PIN Maker</h1>
<?php
if ( $error !== false ) {
    print '<p style="color:red">';
    print htmlentities($error);
    print "</p>\n";
}

if ( $md5 !== false ) {
    print "<p>MD5 value: ".htmlentities($md5)."</p>";
}
?>

<form>
<input type="text" name="pin" value="<?= htmlentities($pin) ?>"/>
<input type="submit" value="Compute MD5 for PIN"/>
</form>
<ul>
  <li><a href="makepin.php">Reset this page</a></li>
  <li><a href="index.php">Back to Cracking</a></li>
</body>
</html>
