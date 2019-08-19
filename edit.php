<?php
require('Library.php');

if (isset($_GET['kode'])) {
    $Lib = new Library();
    $book = $Lib->editBook($_GET['kode']);
    $edit = $book->fetch(PDO::FETCH_OBJ);
    ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h2>Ubah Data Buku</h2>
        <form action="edit.php" method="POST" class="form-group">
            Kode Buku: <input type="text" name="kode" value="<?php echo "$edit->kodeBuku"; ?>" class="form-control"><br>
            Judul Buku: <input type="text" name="judul" value="<?php echo "$edit->judulBuku"; ?>" class="form-control"><br>
            Pengarang Buku: <input type="text" name="pengarang" value="<?php echo "$edit->pengarang"; ?>" class="form-control"><br>
            Penerbit Buku: <input type="text" name="penerbit" value="<?php echo "$edit->penerbit"; ?>" class="form-control"><br>
            <input type="submit" name="updateBook" value="Update" class="btn btn-info">
        </form>
    </div>
</body>

</html>

<?php

}

if (isset($_POST['updateBook'])) {
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    $Lib = new Library();
    $upd = $Lib->updateBook($kode, $judul, $pengarang, $penerbit);
    if ($upd == "Success") {
        header('Location: List.php');
    }
}
?>