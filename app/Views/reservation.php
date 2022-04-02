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

</body>

</html>