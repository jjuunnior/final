<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>locadora</title>
  <?php
    include "_includes/header.php";
  ?>
  
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
            <h1 class="m-0 text-dark">Adicionar Filme</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="infil.php">fimes</a></li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Cadastro Novo filme</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" name="form_distribuidora" method="POST" action="cad_dist.php" >
            <div class="card-body">
              <div class="form-group">
                <label for="filme">Filme</label>
                <input type="text" class="form-control" id="filme" name="filme" placeholder="Nome Do Filme" required>
              </div>
              <div class="form-group">
                <label for="genero">Genero</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
              </div>
              <div class="form-group">
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control" id="tempo" name="tempo">
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>

</body>
</html>


