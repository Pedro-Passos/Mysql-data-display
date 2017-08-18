<?php
//Template for the songs query
$fileSng = 'templates/songs.html';
//Load the contents of the template for the songs query
$tplSng = file_get_contents($fileSng);

// Content that will be placed into placeholder values in the template
$title = 'Songs';
$heading = 'Songs page';
$tblheading = 'Here are our featured tracks, artists responsible and duration!';
// Executes query and stores output into $content
$result = mysqli_query($link, $sqlSongs);
$content= songsQ($result, $tplSng);
?>