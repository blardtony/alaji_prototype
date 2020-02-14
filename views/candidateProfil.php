<?php
require('../utils/candidateProfil.php');
require('../utils/attempts.php');
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

        <?php
            $note1 = $reviewAttempt->questions[0]->mark;
            $note2 = $reviewAttempt->questions[1]->mark;
            $note3 = $reviewAttempt->questions[2]->mark;
            $note4 = $reviewAttempt->questions[3]->mark;
         ?>
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
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
                                    <td></td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Critères 2</th>
                                    <td><?php echo intval($note2); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Critères 3</th>
                                    <td><?php echo intval($note3); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><td>
                                </tr>
                                <tr>
                                    <th>Critères 4</th>
                                    <td><?php echo intval($note4); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../template/bottom.php');?>
