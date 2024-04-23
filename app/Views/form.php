<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Form Jawaban</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/lib/select2/css/select2.min.css')?>">
    <link href="<?php echo base_url('/public/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/public/css/app.min.css')?>" rel="stylesheet" type="text/css" id="app-style" />
    <link href="<?php echo base_url('/public/custom/custom.css')?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('/public/js/vendor.min.js')?>"></script> 
</head>

<body>
    <div class="account-pages d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="mb-lg-4 mb-3">
            <img src="<?php echo base_url('/public/img/Bravo.png')?>" class="d-lg-block d-none" style="max-width: 30vw">
            <img src="<?php echo base_url('/public/img/Bravo.png')?>" class="d-lg-none d-block" style="max-width: 60vw">
        </div>

        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-8 col-lg-6 col-xl-4 col-12">
                    <div class="card">
                        <div class="card-body p-4" style="border-radius: 4px">
                            <form id="formJawaban" class="">
                                <?php
                                if ($_SESSION['user_status'] == $_SESSION['game_status']) {
                                    echo 
                                    '
                                    <div style="">
                                        <div class="row py-4" id="title_cont">
                                            <p class="m-0">Aplikasi down di malam minggu</p>
                                            <p class="">Hati tenang teringat liburan</p>
                                            <br />
                                            <h1 class="m-0" style="font-size: 20px;">Bapak Ibu, sambil menunggu</h1>
                                            <h1 class="m-0" style="font-size: 20px;">Siapkan mental untuk ujian</h1>
                                        </div>
                                    </div>
    
                                    <div class="row" style="display:none" id="demo_cont">
                                        <h1 class="text-center" id="demo"></h1>
                                    </div>
    
                                    <div class="text-center row mb-2" id="btn_timer_cont" style="display: none">
                                        <div class="col-12">
                                            <button class="w-100 btn btn-success" type="button" id="btn_timer" onclick="TimerStart()" style="display: none">Timer Start</button>
                                        </div>
                                    </div>
    
                                    <div class="row" style="display: none" id="jawaban_cont">
                                        <div class="col-12">
                                            <select id="jawaban" name="jawaban[]" class="form-control">
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="text-center" style="display:none">
                                        <button class="btn btn-success" type="submit" id="btn_submit">Kirim</button>
                                    </div>
                                    ';
                                } else {
                                    echo '
                                    <div style="">
                                        <div class="row py-4" id="title_cont">
                                            <h1 class="m-0" style="font-size: 20px;">Mohon Maaf, tidak ada akses</h1>
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

<script src="<?php echo base_url('/public/lib/select2/js/select2.min.js')?>"></script>
<script src="<?php echo base_url('/public/lib/select2/js/i18n/id.js')?>"></script>

<script>
    $('#jawaban').select2({
        multiple: true,
        allowClear: false,
        placeholder: 'Isi Jawaban Anda',
        width: '100%',
        dropdownParent: $("#formJawaban"),
        tags: true,
        language: {
            noResults: function () { return "Silakan tulis jawaban Anda" }
        },
        tokenSeparators: [',']
    })

    function long_polling_timer_start() {
        $.ajax({
            async: true,
            url: "TestSSE",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "GET",
            timeout: 10000,
            cache: false,
            success: function(response) {
                if (response == '1') {
                    $('#btn_timer').click();
                } else {
                    long_polling_timer_start();    
                }
            },
            error: function() {
                long_polling_timer_start();
            }
        });
    }
    
    $(document).ready(function () {
        $('#btn_timer').fadeIn(300);

        long_polling_timer_start();
    })

    function TimerStart() {
        $('#title_cont').fadeOut(300);
        $('#btn_timer_cont').fadeOut(300);
        $('#demo_cont').fadeIn(300);
        $('#jawaban_cont').fadeIn(300);
        $('#jawaban').select2('open');

        var countDownDate = new Date();
        countDownDate.setSeconds(countDownDate.getSeconds() + 62);

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                // document.getElementById("demo").innerHTML = "EXPIRED";

                $('#btn_submit').click()
            }
        }, 1000);
    }

    $("#formJawaban").on("submit", function (e) {
        e.preventDefault();
        $("#btn_submit").disableBtn();
        
        $.ajax({
            url: "SubmitForm",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                window.location = "RuangTunggu"
            }
        });
    });

    jQuery.fn.extend({
        disableBtn: function () {
            return this.each(function () {
                var $this = $(this).html();
                $(this).html("Diproses");
                $(this).prop("origin-text", $this);
                $(this).attr("disabled", true);
                $(this).addClass("k-state-disabled");
            });
        },

        enableBtn: function () {
            return this.each(function () {
                if ($(this).prop("origin-text") != null)
                    $(this).html($(this).prop("origin-text"));
                $(this).attr("disabled", false);
                $(this).removeClass("k-state-disabled");
            });
        }
    });
</script>

<script src="<?php echo base_url('/public/js/app.min.js')?>"></script>
</html>