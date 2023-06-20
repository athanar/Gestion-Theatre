<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Théâtre</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Gestion Théâtre</b></a>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <a href="{{ route('entreprises.index') }}" class="btn btn-primary btn-sm">Entreprise / Clients</a>
                        <a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm">Contacts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <a href="{{ route('intervenants.index') }}" class="btn btn-primary btn-sm">Intervenants</a>
                        <a href="{{ route('projets.index') }}" class="btn btn-primary btn-sm">Projets</a>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher par nom de contact, projet, client, intervenants ou raison sociale d'entreprises" aria-label="Rechercher" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>        
        
        <div class="card mb-4">
            <div class="card-body">
                <h4>ChangeLog</h4>
                <ul>
                    <li>12/06/23 : Ajout rémunération (en cours), champ date, prix de vente, commentaire</li>
                    <li>12/06/23 : Ajout rémunération (en cours)</li>
                    <li>04/06/23 : Un champ de recherche salarié (par nom, prénom) afin de sélectionner le salarié</li>
                    <li>25/05/23 : Rajouter un statut par projet : Validé / en cours / perdu</li>
                    <li>24/05/23 : Ajout module de recherche (terminé)</li>
                    <li>23/05/23 : Ajout module de recherche (en cours)</li>
                    <li>21/05/23 : Style, Pièces jointes, </li>
                    <li>20/05/23 : Modification projet</li>
                    <li>19/05/23 : Ajout lien entreprise dans la page projet</li>
                    <li>11/05/23 : Association projet<>clients<>Entreprise</li>
                    <li>11/04/23 : Contacts : Ajout/Suppresion/Modification</li>
                    <li>12/03/23 : Page projets : ajout intervenants</li>
                    <li>08/03/23 : Page création/vue projets </li>
                    <li>21/02/23 : Page création/vue intervenants </li>
                    <li>18/02/23 : Ajout Model Intervenants + Page création intervenants</li>
                    <li>15/02/23 : Ajout des commentaires pour un contact.</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4>RAF</h4>
                <ul>
                    <li>A chaque comédien, il faut pouvoir indiquer un montant de rémunération qui puisse être visible (chaque comédien n’est pas payé le même montant en fonction de son rôle) + type de rémunération (cachet / facture)</li>
                    <li>Un champ « détail budget » qui puisse différentier le type de budget en reportant les données en fonction de la case cochée)</li>
                    <li>Sur page de garde, rajouter fonction recherche par champ sémantique </li>
                    <li>Accès admin</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>