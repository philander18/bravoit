
<?= $this->extend('/layouts/admin') ?>
<?= $this->section('styles') ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">GAMES 2</h1>
    </div>
          <div style="width:100%">
          <table class="table table-striped table-bordered" id="table-artikel-query">
                        <thead>
                            <tr>
                            <th width="1%">No</th>
                            <th width="2%">username</th>
                            <th width="10%">jawaban</th>
                            <th width="20%">skor</th>
                            <th width="8%">waktu submit</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
          </div>
</div>
    <!-- /.content-wrapper -->
    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
                var tabel = null;
                $(document).ready(function() {
                    tabel = $('#table-artikel-query').DataTable({
                        "processing": true,
                        "responsive": true,
                        "serverSide": true,
                        "ordering": true, 
                        "order": [
                            [3, 'DESC']
                        ], 
                        "ajax": {
                            "url": "<?= site_url('Page/data_sample2');?>",
                            "type": "POST",
                            
                            
                            
                            
                        },
                        "deferRender": true,
                        "aLengthMenu": [
                            [20],
                            [20]
                        ], 
                        "scrollX": true,
                        "columns": [
                            {"data": 'id',"sortable": false, 
                                render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }  
                            },
                            { "data": "username",
                              "render":function(data){
                              return '<b>'+data+'</b>';
                            }}, 
                            { "data": "jawaban" },  
                            { "data": "skor",
                            "render":function(data){
                              return '<b>'+data+'</b>';
                            }}, 
                            { "data": "waktu_submit"}, 
                            
                        ],
                    });
                });
            </script>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<?= $this->endSection() ?>
