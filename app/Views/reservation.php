<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Jura</title>
</head>

<body>
    <?php

    require_once "Template/HeaderAdmin.php";
    ?>

    <br>
    <h1>Les réservations effectuées </h1>
    <br>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Mail</th>
                <th scope="col">Date de reservation</th>
                <th scope="col">date de depart</th>
                <th scope="col">date d'arrivée</th>
                <th scope="col">Pension</th>
                <th scope="col">Nombe de personne</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-active">
                <?php foreach ($nbPersonnes as $reservation) : ?>
            <tr>
                <th scope="row"> <?= $reservation['mail'] ?></th>
                <td> <?= $reservation['dateReservation'] ?></td>
                <td> <?= $reservation['dateDepart'] ?></td>
                <td> <?= $reservation['dateArrivee'] ?></td>
                <td> <?= $reservation['pension'] ?></td>
                <td> <?= $reservation['nbPersonne'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    <br>
    <h1>Ajouter une chambre </h1>
    <br>

    <div class="modal-body">
        <form method='post'>
            <p>Libelle : <input name='libelle' value=''> </input></p>
            <p>Description: <input name='descriptionHebergement' value=''> </input></p>
            <p>Image: <input name='image' value=''> </input></p>
            <p>Batiment :
                <select name="batiment" class="form-select" aria-label="Default select example">
                    <option selected=></option>
                    <option>Batiment A</option>
                    <option>Batiment B</option>
                    <option>Batiment C</option>
                    <option>Batiment D</option>

                </select>
            </p>

            <div class="modal-footer">
                <input type='hidden' name='id'></input>
                <input type='hidden' name='idClient'></input>
                <input type='hidden' name='idHebergement'></input>

                <button type="submit" class="btn btn-primary" formaction="/DashboardAdmin/save">Reserver</button>
            </div>
        </form>
    </div>

    </div>

    <?php
    require_once "Template/Footer.php" ?>
</body>

</html>