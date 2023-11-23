<?php 
  include('../db.php');
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>


<?php 
  include('../../includes/header-form.php');
?>

      <!-- Main Content -->
      <div class="container mt-4">
        <h1 class="text-center">Dar de Alta Un Objeto:</h1>
      </div>

    <div class="d-flex justify-content-center mt-4 gx-4">
    <!-- List of Items Below the Navbar and Form -->
    <div class="d-flex flex-row">
        <div class="card-container mr-3" style="margin-right: 50px;">
            <div class="card" style="width: 18rem;">
                <i class="bi bi-compass text-success" style="font-size: 4rem; text-align: center;"></i>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title">En Posición Anterior</h5>
                    <a href="../oldposicion.php?id=<?php echo $id; ?>" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="card-container mr-3" style="margin-left: 50px;">
            <div class="card" style="width: 18rem;">
                <i class="bi bi-geo-alt-fill text-success-emphasis" style="font-size: 4rem; text-align: center;"></i>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title">En Nueva Posición</h5>
                    <a href="neuform.php?id=<?php echo $id; ?>" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php include("../../includes/footer.php"); ?>