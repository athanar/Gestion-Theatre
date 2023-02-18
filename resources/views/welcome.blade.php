<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Théâtre</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Gestion Théâtre</b></h1>

        <div class="card text-center">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6"> <a href="{{ route('entreprises.index') }}" class="btn btn-primary btn-sm">Entreprise / Clients</a></div>
                    <div class="col col-md-6"> <a href="{{ route('intervenants.index') }}" class="btn btn-primary btn-sm">Intervenants</a></div>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                <div class="row">           
                    <div class="col col-md-6"><a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm">Contacts</a></div>
                    <div class="col col-md-6"><a href="" class="btn btn-primary btn-sm">Projets</a></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="container mt-5">
        <h4><br/><br/>ChangeLog</h4>
        <ul>
            <li>18/02/23 : Ajout Model Intervenants + Page création intervenants</li>
            <li>15/02/23 : Ajout des commentaires pour un contact.</li>
        </ul>
    <div>
    
</body>
</html>