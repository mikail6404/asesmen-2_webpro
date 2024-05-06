<?php
if(isset($_GET['id'])) {
    $idToEdit = $_GET['id'];

    $jsonString = file_get_contents('kategori.json');

    $kategori = json_decode($jsonString, true);

    foreach($kategori as $key => $category) {
        if($category['id'] == $idToEdit) {
            $categoryToEdit = $category;
            break; 
        }
    }
}

if(isset($categoryToEdit)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Kategori</title>
    </head>
    <body>
        <h1>Edit Kategori</h1>
        <form action="updatekategori.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $categoryToEdit['id']; ?>">
            <label for="namaKategori">Nama Kategori:</label>
            <input type="text" id="namaKategori" name="namaKategori" value="<?php echo $categoryToEdit['namakategori']; ?>">
            <button type="submit">Update</button>
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Category not found.";
}
?>
