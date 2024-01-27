<!-- funciones.php -->

<?php
function contentSelector($section) {
    switch ($section) {
        case 'training':
            include 'training.php';
            break;
        case 'registration':
            include 'registration.php';
            break;
        case 'trainingMaterial':
            include 'trainingMaterial.php';
            break;
        default:
            include 'defaultContent.php'; 
    }
}
?>
