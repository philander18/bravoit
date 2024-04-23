


<?= $this->extend('/layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <?php if ($_SESSION['P_BravoIT'] == '1')
    {
        echo '<div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <h1 class="h3 mb-0 text-gray-800">Panel Games 1</h1>
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                    <div class="row no-gutters align-items-center">
                        <button onclick="start1()">Start Games 1</button>
                        <button onclick="finalisasi1()">Finalisasi Games 1</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <h1 class="h3 mb-0 text-gray-800">Panel Games 2</h1>
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                    <div class="row no-gutters align-items-center">
                    <button onclick="start2()">Start Games 2</button>
                    <button onclick="finalisasi2()">Finalisasi Games 2</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                <h1 class="h3 mb-0 text-gray-800">Panel Games 3</h1>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <button onclick="start3()">Start Games 3</button>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        
    </div>';

    } else { 
        echo "<span>Gagal </span>";
    } 
    ?>
    
    <!-- Content Row -->
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script >
    function start1(){
        $.ajax({
            url: "game1_start",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
    }

    function finalisasi1(){
        $.ajax({
            url: "game1_finalisasi",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
    }

    function start2(){
        $.ajax({
            url: "game2_start",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
    }

    function finalisasi2(){
        $.ajax({
            url: "game2_finalisasi",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
    }

    function start3(){
        $.ajax({
            url: "game3_start",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: "POST",
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>


<?= $this->endSection() ?>