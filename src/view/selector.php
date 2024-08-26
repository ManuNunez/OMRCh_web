<?php
function contentSelector($section) {
<<<<<<< Updated upstream
    $allowedSections = ['training', 'registration', 'login', 'user-registered','sign-up','contest', 'profile'];
=======
    $allowedSections = ['training', 'registration', 'login', 'user-registered','sign-up','contest','index'];
>>>>>>> Stashed changes
    
    if (in_array($section, $allowedSections)) {
        $filename ='components/' . $section . '.php';
        //echo $filename;
    } else {
        $filename = 'not-permited.php';
    }
    include_once $filename;
}


