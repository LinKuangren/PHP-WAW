<div class="grid grid-cols-4 gap-4 mt-5">
    <?php foreach($data['listeRoadTrip'] as $index => $currentRoadTrip) { ?>
        <?php $checkpoint = $currentRoadTrip->getAllCheckpoint($currentRoadTrip->getId()); ?>
        <div class="card w-46 bg-base-100 shadow-xl">
            <div class="card-body">
                <a href="/index.php?page=detailsRoadTrip&id=<?= $currentRoadTrip->getId() ?>">
                    <img alt="Placeholder" class="block h-auto w-full" src="<?= $currentRoadTrip->getImage() != null ? $currentRoadTrip->getImage() : "https://picsum.photos/1920/1080/?random" ?>">
                </a>
                <h2 class="card-title"><?= $currentRoadTrip->getIntitule() ?></h2>
                <h3><?= $currentRoadTrip->getUser()->getEmail() ?></h3>
                <?php foreach($checkpoint as $index => $currentCheckPoint) { ?>
                    <?php if($index == array_key_first($checkpoint)) { ?>
                        <h3><strong>Adresse</strong> : <?= $currentCheckPoint->getCoordonnee() ?></h3>
                        <p><strong>Date de départ</strong> : <?= $currentCheckPoint->getDateDepart() ?></p>
                    <?php } ?>
                    <?php if($index == array_key_last($checkpoint)) { ?>
                            <h3><strong>Adresse</strong> : <?= $currentCheckPoint->getCoordonnee() ?></h3>
                            <p><strong>Date d'arrivée</strong> : <?= $currentCheckPoint->getDateArrive() ?></p>
                    <?php } ?>
                <?php } ?>
                <p><?= $currentRoadTrip->getDescription() ?></p>

                <div class="flex justify-end gap-5">
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $currentRoadTrip->getUser()->getId()){ ?>
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