<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Data Kategori</h1>
    <a href="#" id="tambahDataLink">Tambah Data</a>

    <div id="tambahDataForm" style="display: none;">
        <form id="kategoriForm">
            <label for="namaKategori">Nama Kategori:</label>
            <input type="text" id="namaKategori" name="namaKategori">
            <button type="submit">Tambah</button>
        </form>
    </div>

    <table border="1" cellspacing="0" id="kategoriTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayKategori() {
                $.getJSON("kategori.json", function(data) {
                    // Clear existing table rows
                    $("#kategoriTable tbody").empty();

                    $.each(data, function(index, category) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + category.id + "</td>");
                        newRow.append("<td>" + category.namakategori + "</td>");
                        newRow.append("<td><a href='editkategori.php?id=" + category.id + "'>Ubah</a> <a href='hapuskategori.php?id=" + category.id + "'>Hapus</a></td>");
                        $("#kategoriTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayKategori();

            $("#tambahDataLink").click(function() {
                $("#tambahDataForm").toggle();
            });

            $("#kategoriForm").submit(function(event) {
                event.preventDefault();
                var namaKategori = $("#namaKategori").val();

                $.ajax({
                    url: "insert_data.php",
                    method: "POST",
                    data: {
                        namaKategori: namaKategori
                    },
                    success: function(response) {
                        fetchAndDisplayKategori();
                        $("#tambahDataForm").hide();
                    }
                });
            });
        });
    </script>
</body>

</html>
