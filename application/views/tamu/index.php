<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <p class="text-center">BUKU TAMU</p>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo base_url('tamu/insert'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Hp</label>
                                <div class="col-sm-10">
                                    <input type="text" onkeypress="return isNumberKey(event)" name="nomor_hp" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="keperluan" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="camera">Capture</div>
                            <div id="webcam">
                                <input type=button class="btn btn-warning mt-4" value="Capture" onClick="preview()">
                            </div>
                            <div id="simpan" style="display: none;">
                                <input type=button class="btn btn-danger mt-4" value="Remove" onClick="batal()">
                                <input type="hidden" value="" name="cam" id="cam">
                                <input type=submit name="kirim" class="btn btn-primary mt-4" value="Submit All Data" onClick="simpan()">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../../../assets/webcam/webcam.min.js"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        // konfigursi webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach('#camera');

        function preview() {
            // untuk preview gambar sebelum di upload
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }

        function batal() {
            // batal preview
            Webcam.unfreeze();

            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }

        function simpan() {
            // ambil foto
            Webcam.snap(function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                let val = document.getElementById("cam").value = raw_image_data;
                console.log(val);

                // tampilkan hasil gambar yang telah di ambil
                document.getElementById('hasil').innerHTML =
                    '<p>Hasil : </p>' +
                    '<img src="' + data_uri + '"/>';

                Webcam.unfreeze();

                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            });
        }
    </script>
    <?php
    if ($this->session->flashdata('succes')) { ?>
        <script>
            alert("berhasil tambah tamu");
        </script>
    <?php }
    ?>
</body>

</html>