<?php
require('../utils/candidateList.php');
include('../template/header.php');
include('../template/navbar.php');
 ?>
    <div class="container">
        <div class="row">
            <?php
            //Faire une boucle pour obtenir la liste des candidats 
            foreach ($datas as $data) {
                $roles = $data->roles[0]->roleid;
                if ($roles === 5 ) {
                    $fullName = $data->fullname;
                    $id = $data->id;
                    $imageProfile = $data->profileimageurl;
                ?>
                <div class="col-md-3 mt-5">
                    <div class="card text-center">
                    <img src="<?php echo $imageProfile; ?>" alt="Photo de profil" width="100%" height="250">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fullName; ?></h5>
                            <a href="./candidateProfil.php/<?php echo $id ?>" class="btn btn-info">Choisir ce candidat</a>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
<?php include('../template/bottom.php');?>
