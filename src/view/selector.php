<?php
function contentSelector($section) {
    $allowedSections = ['training', 'registration', 'login', 'user-registered','contest'];
    
    if (in_array($section, $allowedSections)) {
        $filename ='components/' . $section . '.php';
    } else {
        $filename = 'index.php';
    }
    echo $filename;

    include_once $filename;
}


