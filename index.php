<?php
/*
 * Building Web Applications using MySQL and PHP
 * Pedro Dos Passos
 */

// Include the application configuration settings
require_once 'includes/config.inc.php';
// Allows our SQL queries to be used
require_once 'sql/queries.php';
// Connect to database
require_once('includes/db_connect.php');
// Include the function definitions
require_once 'includes/functions.inc.php';
/*
 * Import template(s)
 * -----------------------------------------------------------------------------
 */
// Set which template(s) to use
$fileH = 'templates/header.html';
$fileF = 'templates/footer.html';
$fileSngH = 'templates/tblHeader.html';
$fileSngF = 'templates/tblFooter.html';
$fileSum = 'templates/dbsum.html';

// Load the contents of the template files
$tplH = file_get_contents($fileH);
$tplF = file_get_contents($fileF);
$tplSngH = file_get_contents($fileSngH);
$tplSngF = file_get_contents($fileSngF);
$tplSum = file_get_contents($fileSum);

// Db summary queried and called here because it is used on all content views
// Execute the query, assigning the result to $dbSum
$dbSum = mysqli_query($link, $sqlSum);
// Call dbsummary function and pass sql query aswell as template, then assign to $summary
$summary = dbSummary($dbSum, $tplSum);

/*
 Detects whether index.php has been requested without query string
 If no parameter detected...
*/
if (!isset($_GET['page'])) {
    $id = 'home'; // Display home page
} else {

    $id = $_GET['page']; // Else requested page
}
// Switch statement to decide content of page
switch ($id) {
    case 'home' :
        include 'views/home.php';
        break;
    case 'artists' :
        include 'views/artists.php';
        break;
    case 'songs' :
        include 'views/songs.php';
        break;
    default :
        include 'views/404.php';
}

/*
Template filler values are replaced here as we have two sets of templates each used by two of the views
Instead of repeating the code twice inserting it into each view.
The load is kept light by only replacing the values for the required view.
*/
if (isset($id)) { // Check for $id
    // If statement which checks $id then replaces relevant placeholder values for that view
    if (($id === 'songs') || ($id === 'artists')){
        // Songs and artists share the same template, placeholder values are replaced here
        $pass1 = str_replace('[+title+]', $title, $tplSngH);
        $pass2 = str_replace('[+heading+]', $heading, $pass1);
        $pass3 = str_replace('[+tblheading+]', $tblheading, $pass2);
        $pass4 = str_replace('[+content+]', $content, $pass3);
        $pass4 .= $tplSngF;
        $final = str_replace('[+summary+]', $summary, $pass4);
        // Displays finished content for selected view for the user
        echo $final;
    }else {
        // Home and error page share the same template placeholder values are replaced here
        $pass1 = str_replace('[+title+]', $title, $tplH);
        $pass2 = str_replace('[+heading+]', $heading, $pass1);
        $final = str_replace('[+content+]', $content, $pass2);
        $final .= $summary.$tplF;
        // Displays finished content for selected view for the user
        echo $final;
    }
}else {
    // Incase something goes wrong error receives error message
    echo "Sorry there has beeen an error please try again later";
}

// No more database querying left so link to database is closed
mysqli_close($link);

?>
