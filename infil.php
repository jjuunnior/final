<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Locadora</title>
  <?php
    session_start();
    include "_includes/header.php";
  ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
    include "_includes/leftnav.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Locadora</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
            
            if (isset($_SESSION['msg_del'])){
              $mensagem = $_SESSION['msg_del'];
              echo "
              <script>
                window.onload = function(){
                  toastr.error('$mensagem')
                } 
              </script>";
            }
            
            session_unset();
            
        ?>

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Filmes</h3>
                
                <small class="float-right"><a href="add_fil.php"> <button type="button" class="btn btn-block btn-primary">Add Novo filme</button></a>    </small>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>CÓDIGO</th>
                    <th>FILME</th>
                    <th>GENERO</th>
                    <th>TEMPO</th>
                    <th>AÇÕES</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php
                    
                    include "conexao.php";
                    $conn = connection();

                    try {
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM distribuidora");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $k=>$v) {
                        //echo $v;
                        //var_dump($v);
                        echo '<tr>';
                        echo '<td>'.$v['id'].'</td>';
                        echo '<td>'.$v['filme'].'</td>';
                        echo '<td>'.$v['genero'].'</td>';
                        echo '<td>'.$v['tempo'].'</td>';
                        echo '<td style="text-align:center"> 
                              <a class="btn btn-primary btn-sm" href="vis_dist.php?id='.$v['id'].'"><i class="fas fa-folder"></i></a>
                              <a class="btn btn-info btn-sm" href="edt_fil.php?id='.$v['id'].'"><i class="fas fa-pencil-alt"></i></a>                            
                              <a class="btn btn-danger btn-sm" href="delete.php?id='.$v['id'].'" data-href="delete.php?id='.$v['id'].'" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash"></i></a>                                                 
                              </td>';
                        echo '</tr>';


                    }
                    } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    //echo "</table>";
                ?>

                  </tbody>                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        



            



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>



<div class="modal fade" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Confirmar Exclusão</h4>
       
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja excluir essa Filme?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-outline-light btn-ok">confirmar.</a>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>


<script>

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

</script>




</body>
</html>


