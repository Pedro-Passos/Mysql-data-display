<?php

// Songs query which returns Track Title, Artist and Duration in mm:ss formation
$sqlSongs = "SELECT 
            title AS 'Track Title',
            name AS 'Artist',
            TIME_FORMAT(SEC_TO_TIME(duration), '%i:%s') AS 'Duration'
        FROM
            song
                LEFT JOIN
            artist A ON artist_id = A.id
        ORDER BY name ASC, title ASC";

// Artists query which returns Artist and No. of Songs
$sqlArtists = "SELECT 
            name as 'Artist', COUNT(artist_id) AS 'No. of Songs'
        FROM
            song
                LEFT JOIN
            artist A ON artist_id = A.id
        GROUP BY name
        ORDER BY name ASC";

// Songs query which returns Total songs in the database and total Active Artists
$sqlSum = "SELECT 
            COUNT(DISTINCT S.id) AS 'Total Songs',
            COUNT(DISTINCT artist_id) AS 'Total Active Artists'
        FROM
            song S
                LEFT JOIN
            artist A ON artist_id = A.id";

?>
