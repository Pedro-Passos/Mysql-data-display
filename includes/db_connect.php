<?php
// Connect to mysql server
$link = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

// Check connection succeeded
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error('Sorry, there has been an error. Please try again later.'));
}

?>
