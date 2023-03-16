<?php
function getAllFromACategories($category, $rand = false)
{
    $allMovies = array();
    $query = "SELECT * FROM `movies`";
    if ($rand) $query .= ' ORDER BY RAND() LIMIT 7';
    $res = my_query($query);
    foreach ($res as $key => $movie) {
        $arrCategories = explode(',', $movie['categories']);
        if (in_array($category, $arrCategories)) {
            array_push($allMovies, $movie);
        }
    }
    return $allMovies;
}
