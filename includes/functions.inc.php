<?php

//Function displays the artist & their number of songs
function artistsQ ($result, $tplArt){
    $atvArtists = '';
    // Check query
    if ($result === false) {
        exit('Sorry, there has been an error. Please try again later.');
    } else {
        // Fetches the query results and replaces the filler spots on the template
        while ($row = mysqli_fetch_assoc($result)) {
            $pass1 = str_replace('[+artist+]',htmlentities($row['Artist']),$tplArt);
            $final = str_replace('[+noSongs+]',htmlentities($row['No. of Songs']),$pass1);
            $atvArtists.= $final;
        }
    }
    // Finished with the result and clear it from memory
    mysqli_free_result($result);
    // Returns the completed output for the artists query
    return $atvArtists;
}

function songsQ ($result, $tplSng){
    $dtlSong = '';
    // Check query
    if ($result === false) {
        exit('Sorry, there has been an error. Please try again later.');
    } else {
        // Fetches the query results and replaces the filler spots on the template
        while ($row = mysqli_fetch_assoc($result)) {
            $pass1 = str_replace('[+song+]', htmlentities($row['Track Title']),$tplSng);
            $pass2 = str_replace('[+artist+]',htmlentities($row['Artist']),$pass1);
            $final = str_replace('[+duration+]',htmlentities($row['Duration']),$pass2);
            $dtlSong.= $final;
        }
    }
    // Finished with the result and clear it from memory
    mysqli_free_result($result);
    // Returns the completed output for the songs query query
    return $dtlSong;
}

//Function displays our database summary
function dbSummary ($dbSum, $tplSum){
    if ($dbSum === false) {
        exit('Sorry, there has been an error. Please try again later.');
    } else {
        $row = mysqli_fetch_assoc($dbSum);
        $pass1 = str_replace('[+numSongs+]', htmlentities($row['Total Songs']), $tplSum);
        $summary = str_replace('[+numArtists+]',htmlentities($row['Total Active Artists']), $pass1);
        // Finished with the result and clear it from memory
        mysqli_free_result($dbSum);
        // Returns the completed output for the database summary query
        return $summary;
    }
}

?>