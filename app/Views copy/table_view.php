<!doctype html>
<html lang="en">
    <head>
        <title>Datatables Server Side Tutorial</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <div class="container">
                <a class="navbar-brand" href="#">Datatables CodeIgniter</a>
            </div>
        </nav>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5> Data  Menu</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table-artikel-query">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Kategori </th>
                                <th> Sub Kategori </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <script>
                var tabel = null;
                $(document).ready(function() {
                    tabel = $('#table-artikel-query').DataTable({
                        "processing": true,
                        "responsive": true,
                        "serverSide": true,
                        "ordering": true, 
                        "order": [
                            [2, 'asc']
                        ], 
                        "ajax": {
                            "url": "<?= site_url('sample/data');?>",
                            "type": "POST",
                            
                            
                            
                            
                        },
                        "deferRender": true,
                        "aLengthMenu": [
                            [5, 10, 50],
                            [5, 10, 50]
                        ], 
                        "columns": [
                            {"data": 'id_kategori',"sortable": false, 
                                render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }  
                            },
                            { "data": "nama_kategori" },  
                            { "data": "subkat" },  
                            { "data": "id_kategori", 
                            "render": 
                                function( data, type, row, meta ) {
                                    return '<a href="show/'+data+'">Show</a>';
                                }
                            },
                        ],
                    });
                    
                    
                    
                    
                    
                    
                });
            </script>
        </div>
        <hr/>
            <center>
                Dibuat dengan <i class="fa fa-heart" style="color:red;"></i> Oleh 
                <a href="https://www.codekop.com/" target="_blank">Codekop</a> © <?= date('Y');?>
            </center>
        <br/>

        
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    </body>
</html>