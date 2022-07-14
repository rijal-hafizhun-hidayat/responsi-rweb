<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col">Email</th>
                                <th scope="col">keperluan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($sistem->result() as $row) { ?>
                                <tr>
                                    <th><?php echo $nomor++; ?></th>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->nomor_hp; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->keperluan; ?></td>
                                    <td><img width="200px" height="200px" class="img-fluid" src="../../../img/tamu/<?php echo $row->cam; ?>" alt=""></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a class="btn btn-danger" href="<?php echo base_url('dashbord/destroy/' . $row->id); ?>">Hapus</a>
                                            <a class="btn btn-warning" href="<?php echo base_url('dashbord/show/' . $row->id); ?>">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>