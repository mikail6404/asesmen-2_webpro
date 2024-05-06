<?php
if(isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    $jsonString = file_get_contents('kategori.json');

    $kategori = json_decode($jsonString, true);

    foreach($kategori as $key => $category) {
        if($category['id'] == $idToDelete) {
            unset($kategori[$key]);
            break; 
        }
    }

    $updatedJsonString = json_encode($kategori);

    file_put_contents('kategori.json', $updatedJsonString);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
