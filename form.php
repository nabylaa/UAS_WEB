<?php
include 'config.php';

$ntn        = "";
$player       = "";
$club     = "";
$sektor   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from t_player where id = '$id'";
    $q1         = mysqli_query($conn,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from t_player where id = '$id'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $ntn      = $r1['nation'];
    $player       = $r1['player'];
    $club     = $r1['club'];
    $sektor   = $r1['sector'];

    if ($ntn == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $ntn        = $_POST['ntn'];
    $player       = $_POST['player'];
    $club     = $_POST['club'];
    $sektor   = $_POST['sektor'];

    if ($ntn && $player && $club && $sektor) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update t_player set nation = '$ntn',player='$player',club = '$club', sector='$sektor' where id = '$id'";
            $q1         = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into t_player(nation,player,club,sector) values ('$ntn','$player','$club','$sektor')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pendaftaran | BWF</title>
        <link rel="stylesheet" href="css/form.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
        <link rel="icon" href="images/shuttlecock.png" type="image">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        <style>
        .mx-auto {
            width: 800px
        }
        .card {
            margin-top: 10px;
        }
        </style>

    </head>
    <body>
        <header>
            <div class="header"></div>
                <h1>Form Pendaftaran</h1>
            </div>
        </header> 
        <div class="body"></div>
        <div class="text">
            <h1>Pendaftaran Tournament Indonesia Open 2023 </h1>
        
            <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Form Pendaftaran Player
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=header.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url= form.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="abs" class="col-sm-2 col-form-label">Nation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ntn" name="ntn" value="<?php echo $ntn ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Player</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="player" name="player" value="<?php echo $player ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Asal Club</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="club" name="club" value="<?php echo $club ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">Sector</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sektor" id="sektor">
                                <option value="">- Choose Sector -</option>
                                <option value="MS" <?php if ($sektor == "MS") echo "selected" ?>>Men's Singles</option>
                                <option value="MD" <?php if ($sektor == "MD") echo "selected" ?>>Men's Doubles</option>
                                <option value="WS" <?php if ($sektor == "WS") echo "selected" ?>>Women's Singles</option>
                                <option value="WD" <?php if ($sektor == "WD") echo "selected" ?>>Women's Doubles</option>
                                <option value="MXD" <?php if ($sektor == "MXD") echo "selected" ?>>Mixed Doubles</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Upload" class="btn btn-primary" style="background-color: crimson;" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card" style="background-color: #F9C5D5;">
            <div class="card-header text-white bg-secondary">
                Data Player 
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Player's Name</th>
                            <th scope="col">Club</th>
                            <th scope="col">Sector</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from t_player order by id desc";
                        $q2     = mysqli_query($conn, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $ntn        = $r2['nation'];
                            $player       = $r2['player'];
                            $club     = $r2['club'];
                            $sektor   = $r2['sector'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $ntn ?></td>
                                <td scope="row"><?php echo $player ?></td>
                                <td scope="row"><?php echo $club ?></td>
                                <td scope="row"><?php echo $sektor ?></td>
                                <td scope="row">
                                    <a href="form.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="form.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure to delete this data?')"><button type="button" class="btn btn-danger" style="background-color: crimson;">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
        <br>
        <br>
        <br>
        <footer>
            <p>copyright@BWF</p>
        </footer>
    </body>
</html>

      