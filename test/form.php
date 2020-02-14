<?php
include('../template/header.php');
include('../template/navbar.php');
 ?>
<div class="container">
    <form action="" method="post">
        <p>Critère 1 oral : <input type="number" name="critere1" step="1" min="0" max="1"><span class="error"></span></p>
        <p>Critère 2 oral : <input type="number" name="critere2" step="1" min="0" max="1"><span class="error"></span></p>
        <p>Critère 3 oral : <input type="number" name="critere3" step="1" min="0" max="1"><span class="error"></span></p>
        <p>Critère 4 oral : <input type="number" name="critere4" step="1" min="0" max="1"><span class="error"></span></p>
        <input class="btn btn-secondary" type="submit" name="submit" value="Envoie!" />
    </form>
</div>
<?php include('../template/bottom.php');?>
