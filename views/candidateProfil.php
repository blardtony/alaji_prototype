<?php
require('../utils/candidateProfil.php');
require('../utils/attempts.php');
require('../utils/calcul.php');

include('../template/header.php');
include('../template/navbar.php');


?>
    <div class="container">
        <div class="row">
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
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card  text-center">
                    <div class="card-title mt-2">
                        <h3>Entrer les notes de l'entretien oral</h3>
                    </div>

                    <!-- Formulaire pour envoyer les notes de l'entretien oral -->
                    <div class="card-body">
                        <form action="" method="post">
                            <p>Critère 1 oral : <input type="number" name="critere1" step="1" min="0" max="1"></p>
                            <p>Critère 2 oral : <input type="number" name="critere2" step="1" min="0" max="1"></p>
                            <p>Critère 3 oral : <input type="number" name="critere3" step="1" min="0" max="1"></p>
                            <p>Critère 4 oral : <input type="number" name="critere4" step="1" min="0" max="1"></p>
                            <input class="btn btn-secondary" type="submit" name="submit" value="Envoie!" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        //Récupérer les notes sur Moodle
        $note1 = $reviewAttempt->questions[0]->mark;
        $note2 = $reviewAttempt->questions[1]->mark;
        $note3 = $reviewAttempt->questions[2]->mark;
        $note4 = $reviewAttempt->questions[3]->mark;

        //Initialiser les notes d'oral.
        $oral1 = "";
        $oral2 = "";
        $oral3 = "";
        $oral4 = "";

        //Récupérer les notes oral du formulaire et calculer les moyennes dès que le formulaire est envoyé.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oral1 = $_POST['critere1'];
            $oral2 = $_POST['critere2'];
            $oral3 = $_POST['critere3'];
            $oral4 = $_POST['critere4'];

            $moyenneCriteria1 = averageCriteria([[intval($note1), 0.23], [$oral1, 0.77]]);
            $moyenneCriteria2 = averageCriteria([[intval($note2), 0.89], [$oral2, 0.11]]);
            $moyenneCriteria3 = averageCriteria([[intval($note3), 0.52], [$oral3, 0.48]]);
            $moyenneCriteria4 = averageCriteria([[intval($note4), 0.34], [$oral4, 0.66]]);

        ?>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <!-- Créer un tableau avec les notes oral et du quiz. Plus le calcul de moyenne et vérifier si le critère est acquis.-->
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Test</th>
                                <th>Oral</th>
                                <th>Moyenne critère</th>
                                <th>Acquis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Critères 1</th>
                                    <td><?php echo intval($note1); ?></td>
                                    <td><?php echo $oral1; ?></td>
                                    <td><?php echo $moyenneCriteria1; ?></td>
                                    <td><?php echo acquis($moyenneCriteria1) ?></td>
                                </tr>
                                <tr>
                                    <th>Critères 2</th>
                                    <td><?php echo intval($note2); ?></td>
                                    <td><?php echo $oral2; ?></td>
                                    <td><?php echo $moyenneCriteria2; ?></td>
                                    <td><?php echo acquis($moyenneCriteria2) ?></td>
                                </tr>
                                <tr>
                                    <th>Critères 3</th>
                                    <td><?php echo intval($note3); ?></td>
                                    <td><?php echo $oral3; ?></td>
                                    <td><?php echo $moyenneCriteria3; ?></td>
                                    <td><?php echo acquis($moyenneCriteria3) ?><td>
                                </tr>
                                <tr>
                                    <th>Critères 4</th>
                                    <td><?php echo intval($note4); ?></td>
                                    <td><?php echo $oral4; ?></td>
                                    <td><?php echo $moyenneCriteria4; ?></td>
                                    <td><?php echo acquis($moyenneCriteria4) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
         ?>
    </div>

<?php include('../template/bottom.php');?>
