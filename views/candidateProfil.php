<?php
require('../utils/candidateProfil.php');
include('../template/header.php');
include('../template/navbar.php');
?>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?php echo $imageProfile; ?>" alt="Photo de profil" width="100%" height="250">
                        </div>
                        <div class="col-lg-9">
                            <h5 class="card-title"><?php echo $fullName; ?></h5>
                            <p><?php echo $email; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../template/bottom.php');?>
