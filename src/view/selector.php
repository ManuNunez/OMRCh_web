<?php
function contentSelector($section) {
    $allowedSections = ['training', 'registration', 'trainingMaterial'];
    
    if (in_array($section, $allowedSections)) {
        $filename ='components/' . $section . '.php';
    } else {
        $filename = 'defaultContent.php';
    }

    include_once $filename;
}
?>
