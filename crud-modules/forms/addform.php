<?php 
  include('../db.php');
?>

<?php 
  include('../../includes/header-form.php');
?>

<div class="container p-4 d-flex flex-xxl-column justify-content-center">
    <div class="row">
            <div class="card card-body mb-3">
                <form action="add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input type="text" name="Nombre" class="form-control" placeholder="Nombre Objeto" autofocus required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Especialidad" class="">Especialidad:</label>
                        <select name="Especialidad" class="form-select" required>
                            <option value="Construcciones">Construcciones</option>
                            <option value="Computación">Computación</option>
                            <option value="Electrónica">Electrónica</option>
                            <option value="Electricidad">Electricidad</option>
                            <option value="Química">Química</option>
                            <option value="Mecánica">Mecánica</option>
                        </select>
                        
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Ubicacion">Vitrina:</label>
                        <input type="number" name="Ubicacion" class="form-control" placeholder="Vitrina" min="0" max="500" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Sector">Sala:</label>
                        <select name="Sector" class="form-select" required>
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
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Descripcion">Descripcion:</label>
                        <textarea name="Descripcion" rows="2" class="form-control" placeholder="Descripción de objeto" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Historia">Descripcion Histórica:</label>
                        <textarea name="Historia" rows="2" class="form-control" placeholder="Descripción histórica de objeto" required></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="add" value="Guardar Objeto">
                </form>
            </div>
        </div>
</div>

<?php include('../../includes/footer.php') ?>