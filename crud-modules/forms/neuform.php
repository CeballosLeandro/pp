<?php 
    include("../db.php");
?>

<?php 
  include('../../includes/header-form.php');
?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <form action="../neuposicion.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="ubicacion">Vitrina:</label>
                            <input type="number" name="ubicacion" class="form-control" placeholder="Vitrina" min="1" max="500" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="sector">Sala:</label>
                            <select name="sector" class="form-select" required>
                                <option value="SCC">Sector Construcciones</option>  <!-- Construcciones -->
                                <option value="SCP">Sector Computación</option>  <!-- Computación -->
                                <option value="SEL">Sector Electrónica</option>   <!-- Electrónica -->
                                <option value="SLC">Sector Electricidad</option>  <!-- Electricidad -->
                                <option value="SQU">Sector Química</option>  <!-- Química -->
                                <option value="SME">Sector Mecánica</option>    <!-- Mecánica -->
                                <option value="SLD">Sala Davinci</option>  <!-- Davinci -->
                                <option value="SLH">Sala Histórica</option>  <!-- Histórica -->
                                <option value="DEP">Depósito</option>  <!-- Depósito -->
                            </select>
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit" name="submit">
                            Dar de Alta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('../../includes/footer.php') ?>