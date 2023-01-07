<div class="grid grid-cols-4 gap-4 mt-5">
    <?php foreach($data['listeRoadTrip'] as $currentRoadTrip) { ?>
        <div class="card w-46 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title"><?= $currentRoadTrip->getIntitule() ?></h2>
                <p><?= $currentRoadTrip->getDescription() ?></p>
                <h3><?= $currentRoadTrip->getUser()->getEmail() ?></h3>
                <div class="flex justify-end gap-5">
                    <?php if($_SESSION['user']['id'] == $currentRoadTrip->getUser()->getId()){ ?>
                        <div class="card-actions">
                            <a href="/index.php?page=updateRoadTrip&id=<?= $currentRoadTrip->getId() ?>" class="btn btn-warning">Modifier</a>
                        </div>
                        <div class="card-actions">
                            <a href="/index.php?page=removeRoadTrip&id=<?= $currentRoadTrip->getId() ?>" class="btn btn-error">Supprimer</a>
                        </div>
                    <?php } ?>
                    <div class="card-actions">
                        <a href="/index.php?page=detailsRoadTrip&id=<?= $currentRoadTrip->getId() ?>" class="btn btn-primary">Détails</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>