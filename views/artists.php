<?php
//Template for the artist query
$fileArt = 'templates/artist.html';
//Load the contents of the template for the songs query
$tplArt = file_get_contents($fileArt);

// Content that will be placed into placeholder values in the template
$title = 'Artists';
$heading = 'Artists page';
$tblheading = 'Here are our featured artists and quantity of tracks';
// Executes query and stores output into $content
$result = mysqli_query($link, $sqlArtists);
$content= artistsQ($result, $tplArt);
?>