<?php
function contentSelector($section) {
    $allowedSections = ['training', 'registration', 'login', 'user-registered','sign-up','contest','index', 'profile'];
    
    if (in_array($section, $allowedSections)) {
        $filename ='components/' . $section . '.php';
        //echo $filename;
    } else {
        $filename = 'not-permited.php';
    }
    include_once $filename;
}


