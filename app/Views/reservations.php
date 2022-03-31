<?php
require_once "Template/HeaderUser.php";
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <title>Projet Jura</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        img {
            height: 280px;
        }

        body {
            background: hsl(0, 0, 94%);
        }
    </style>
</head>

<body>

    <div class="container-fluid my-5">
        <h1 class="text-center fw-bold display-1 mb-5">Mes <span class="text-danger">Séjours</span></h1>
        <div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                <?php foreach($hebergements as $hebergement) : ?>
                    <div class="item mb-4">
                        <div class="card border-0 shadow">
                            <img src="https://www.lemoniteur.fr/mediatheque/0/6/3/001989360_620x393_c.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4><?= $hebergement['libelle'] ?> </h4>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?= $hebergement['idType']?>">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    
                    

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong<?= $hebergement['idType']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier l'utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <form method='post'>
        <p>Nom : <input name='nom' value='<?= $client['nomClient']?>'> </input></p>
        <p>Prenom : <input name='prenom' value='<?= $client['prenomClient']?>'> </input></p>
        <p>Mail : <input name='mail' value='<?= $client['mail']?>'> </input></p>
      </div>
      <div class="modal-footer">
         <input type='hidden' name='id' value="<?= $client['idClient']?>"></input>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" formaction="/DashboardAdmin/update"  >Sauvegarder</button>
        <button type="submit" class="btn btn-primary" formaction="/DashboardAdmin/delete"  >Supprimer</button>
      </div>
      </form>
    </div>
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
</body>

</html>


<?php

require_once "Template/Footer.php";
?>

