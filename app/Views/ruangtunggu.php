<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ruang Tunggu</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/lib/select2/css/select2.min.css') ?>">
    <link href="<?php echo base_url('/public/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/public/css/app.min.css') ?>" rel="stylesheet" type="text/css" id="app-style" />
    <link href="<?php echo base_url('/public/custom/custom.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?= base_url(); ?>public/img/icon.png">
    <script src="<?php echo base_url('/public/js/vendor.min.js') ?>"></script>
</head>

<body>
    <div class="account-pages d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="mb-lg-4 mb-3">
            <img src="<?php echo base_url('/public/img/Bravo.png') ?>" class="d-lg-block d-none" style="max-width: 30vw">
            <img src="<?php echo base_url('/public/img/Bravo.png') ?>" class="d-lg-none d-block" style="max-width: 60vw">
        </div>

        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-8 col-lg-6 col-xl-4 col-12">
                    <div class="card">
                        <div class="card-body p-4" style="border-radius: 4px">
                            <form id="formUsername" class="">

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h1>Ruang Tunggu</h1>
                                        <small>Selamat Menunggu</small>
                                    </div>
                                </div>

                                <?php
                                if ($_SESSION['user_status'] == $_SESSION['game_status']) {
                                    echo
                                    '
                                        <div class="text-center row mb-2" >
                                            <div class="col-12">                                        
                                                <button class="btn btn-blue w-100" type="button" onClick="locations()" id="btn_submit">Ronde Berikutnya</button>
                                            </div>
                                        </div>
                                        ';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url('/public/lib/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('/public/lib/select2/js/i18n/id.js') ?>"></script>

<script>
    function locations() {
        window.location.href = 'Form';
    }



    jQuery.fn.extend({
        disableBtn: function() {
            return this.each(function() {
                var $this = $(this).html();
                $(this).html("Diproses");
                $(this).prop("origin-text", $this);
                $(this).attr("disabled", true);
                $(this).addClass("k-state-disabled");
            });
        },

        enableBtn: function() {
            return this.each(function() {
                if ($(this).prop("origin-text") != null)
                    $(this).html($(this).prop("origin-text"));
                $(this).attr("disabled", false);
                $(this).removeClass("k-state-disabled");
            });
        }
    });
</script>

<script src="<?php echo base_url('/public/js/app.min.js') ?>"></script>

</html>