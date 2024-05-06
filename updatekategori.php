<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonString = file_get_contents('kategori.json');

    $kategori = json_decode($jsonString, true);

    $idToUpdate = $_POST['id'];
    $newNamaKategori = $_POST['namaKategori'];

    foreach ($kategori as $key => &$category) {
        if ($category['id'] == $idToUpdate) {
            $category['namakategori'] = $newNamaKategori;
            break; 
        }
    }

    $updatedJsonString = json_encode($kategori, JSON_PRETTY_PRINT);

    file_put_contents('kategori.json', $updatedJsonString);

    header('Location: index.php');
    exit();
}
