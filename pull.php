<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.
//hello


if ( $_POST['payload'] ) {
putenv('PATH=/usr/local/bin');
echo shell_exec('cd /home4/smakolyk/public_html/test_dwa && /usr/bin/git pull origin main 2>&1');
echo shell_exec('/usr/bin/whoami 2>&1');
echo 'mateusz2';
}
//matiff
?>
