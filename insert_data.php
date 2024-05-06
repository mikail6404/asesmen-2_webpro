<?php
if (isset($_POST['namaKategori'])) {
    $jsonData = file_get_contents('kategori.json');
    
    $kategoriArray = json_decode($jsonData, true);
    
    $newKategori = $_POST['namaKategori'];
    
    $newEntry = array(
        'id' => count($kategoriArray) + 1,
        'namakategori' => $newKategori
    );
    
    $kategoriArray[] = $newEntry;
    
    $updatedJsonData = json_encode($kategoriArray, JSON_PRETTY_PRINT);
    
    file_put_contents('kategori.json', $updatedJsonData);
    
    echo "Data berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data. Form tidak lengkap.";
}

