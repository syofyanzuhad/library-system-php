<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.asd {
    font-weight: bold;
    text-transform: uppercase;
}
</style>
</head>

<body>
    <div class="container">
        <h2>Daftar Buku yang Tersedia</h2>
        <table class="table">
            <tr class="asd">
                <td>Kode Buku</td>
                <td>Judul Buku</td>
                <td>Pengarang Buku</td>
                <td>Penerbit Buku</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
<?php
require("Library.php");
$Lib = new Library();
$show = $Lib->showBooks();
    while ($data = $show->fetch(PDO::FETCH_OBJ)) {
        echo "  
        <tr>
        <td>$data->kodeBuku</td>
        <td>$data->judulBuku</td>
        <td>$data->pengarang</td>
        <td>$data->penerbit</td>
        <td><a class='btn btn-info' href='edit.php?kode=$data->kodeBuku'>Edit</td>
        <td><a class='btn btn-danger' href='List.php?delete=$data->kodeBuku'>Delete</a></td>
        </tr>   ";
    };
?>
        </table>
        <a href="index.php" class="btn btn-success">Tambah Buku Baru</a>
    </div>
</body>
</html>

<?php
if (isset($_GET['delete'])) {
    $del = $Lib->deleteBook($_GET['delete']);
    header("Location: List.php");
} elseif (isset($_GET['kode'])) {
    header("Location: edit.php");
}
?>