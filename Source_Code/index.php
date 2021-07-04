<!DOCTYPE html>
<head><title>Aishwarya Roy</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:

<?php

$pin = "Not found";

// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];
    $checks=0;
    $numbers = "0123456789";
    $show = 15;

    for($i=0; $i<strlen($numbers); $i++ ) {
        $ch1 = $numbers[$i];   //first number

        for($j=0; $j<strlen($numbers); $j++ ) {
            $ch2 = $numbers[$j];  //second number

            for($s=0; $s<strlen($numbers); $s++ ) {
                $ch3 = $numbers[$s]; //third number

                for($t=0; $t<strlen($numbers); $t++ ) {
                $ch4 = $numbers[$t]; //four number

                    $try = $ch1.$ch2.$ch3.$ch4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    $checks++;
                    if ( $check == $md5 ) {
                      $pin = $try;
                      break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                      print "$check $try\n";
                      $show = $show - 1;
                    }
                }
            }
        }
    }
    print"Total Checks: $checks\n";
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time : ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>PIN : <?= htmlentities($pin); ?></p>




<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset this page</a></li>
<li><a href="makecode.php">Make an MD5 PIN</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>

<li><a
href="https://github.com/aishwarya1999-roy/MD5_Cracker/tree/main/Source_Code"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>
