<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2>Tambah Buku Baru</h2>
        <form action="index.php" method="POST" class="form-group row">
            <table>
                <tr>
                    <td> Kode Buku: </td>
                    <td> <input type="text" name="kode" class="form-control"><br></td>
                </tr>
                <tr>
                    <td> Judul Buku: </td>
                    <td> <input type="text" name="judul" class="form-control"><br> </td>
                </tr>
                <tr>
                    <td> Pengarang Buku: </td>
                    <td> <input type="text" name="pengarang" class="form-control"><br> </td>
                </tr>
                <tr>
                    <td> Penerbit Buku: </td>
                    <td> <input type="text" name="penerbit" class="form-control"><br> </td>
                </tr>
                <tr>
                    <td> <br> <input type="submit" name="addBook" value="Add Book" class="btn btn-success"> </td>
                    <td> <br> <input type="reset" value="Reset" class="btn btn-warning"> </ </td> </table> </form>
                            </div> </body> </html> 
                            
<?php
require('Library.php');
if (isset($_POST['addBook'])) {
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    $Lib = new Library();
    $add = $Lib->addBook($kode, $judul, $pengarang, $penerbit);
    if ($add == "Success") {
        header('Location: List.php');
    }
}

?>