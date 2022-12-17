<div class="container w-full mt-5">
    <h1><?= $data['roadTrip'][0]->getIntitule() ?></h1>
    <h3><?= $data['roadTrip'][0]->getUser()->getEmail() ?></h3>
    <h2><?= $data['roadTrip'][0]->getTypeVehicule() ?></h2>
    <div class="grid grid-cols-4 gap-4 mt-5">
        <?php foreach($data['listeCheckPoint'] as $currentCheckPoint) { ?>
            <div class="card w-46 bg-base-100 shadow-xl">
                <div class="card-body">
                    <a href="/index.php?page=removeCheckPoint&id=<?= $currentCheckPoint->getId() ?>&id_roadtrip=<?= $data['roadTrip'][0]->getId() ?>">Supprimer</a>
                    <h2 class="card-title"><?= $currentCheckPoint->getNom() ?></h2>
                    <h3><strong>Adresse</strong> : <?= $currentCheckPoint->getCoordonnee() ?></h3>
                    <p><strong>Date de départ</strong> : <?= $currentCheckPoint->getDateDepart() ?></p>
                    <p><strong>Date d'arrivée</strong> : <?= $currentCheckPoint->getDateArrive() ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>