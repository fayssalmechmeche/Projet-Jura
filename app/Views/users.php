<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Jura</title>
    <link href='assets/style.css' rel="stylesheet">
</head>

<body>
    <?php

    require_once "Template/HeaderAdmin.php";
    ?>



<table class="table m-0">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">pseudo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clients as $client) :?>
                                    <tr>
                                        
                                        <td><?= $client['prenomClient']?></td>
                                        <td><?= $client['nomClient']?></td>
                                        <td><?= $client['identifiant']?></td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                
                                                <li class="list-inline-item">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?= $client['idClient']?>">Modifier</button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-placement="top" title="Delete"><i class="fa fa-trash"></i>Supprimer</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalLong<?= $client['idClient']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier l'utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nom : <input value='<?= $client['nomClient']?>'> </input></p>
        <p>Prenom : <input value='<?= $client['prenomClient']?>'> </input></p>
        <p>Mail : <input value='<?= $client['mail']?>'> </input></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" formaction="/DashboardAdmin/update"  >Sauvegarder</button>
      </div>
    </div>
  </div>
</div>
                                    <?php endforeach;?>
                                    <!-- Modal -->

                                    
                                    
                                </tbody>
                            </table>
</body>

</html>

<script> 

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>