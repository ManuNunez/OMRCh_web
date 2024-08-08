<?php
function contentSelector($section) {
    $allowedSections = ['index','training', 'registration', 'login', 'user-registered','contest'];
    
    if (in_array($section, $allowedSections)) {
        $filename ='components/' . $section . '.php';
    } else {
        $filename = 'index.php';
    }


    include_once $filename;
}


