<?php 
  include('../db.php');
?>

<?php 
  include('../../includes/header-form.php');
?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Dar de Baja Objeto
                    </div>
                    <div class="card-body">
                        <form action="../delete.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="motivoBaja" class="form-label">Motivo de la baja:</label>
                                <select name="motivoBaja" class="form-select" required>
                                    <option value="Donación">Donación</option>
                                    <option value="Reparación">Reparación</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="lugar" class="form-label">Lugar:</label>
                                <input type="text" name="lugar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-danger">Dar de Baja</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("../../includes/footer.php"); ?>