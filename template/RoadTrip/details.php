<div class="container ">
    <img src="<?= $data['roadTrip'][0]->getImage() != null ? $data['roadTrip'][0]->getImage() : "https://picsum.photos/1920/1080/?random" ?>" class="w-full brightness-50 lg:h-full h-[50vh] lg:object-fill object-none" alt="background-liste-roadtrips"/>
    <h1><?= $data['roadTrip'][0]->getIntitule() ?></h1>
    <h3><?= $data['roadTrip'][0]->getUser()->getEmail() ?></h3>
    <h2><?= $data['roadTrip'][0]->getTypeVehicule() ?></h2>
    <h2><?= $data['roadTrip'][0]->getDescription() ?></h2>
    <div class="grid grid-cols-4 gap-4 mt-5">
        <?php foreach($data['listeCheckPoint'] as $currentCheckPoint) { ?>
            <div class="card w-46 bg-base-100 shadow-xl">
                <div class="card-body">
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $data['roadTrip'][0]->getUser()->getId()){ ?>
                        <a href="/index.php?page=removeCheckPoint&id=<?= $currentCheckPoint->getId() ?>&id_roadtrip=<?= $data['roadTrip'][0]->getId() ?>">Supprimer</a>
                    <?php } ?>
                    <h2 class="card-title"><?= $currentCheckPoint->getNom() ?></h2>
                    <h3><strong>Adresse</strong> : <?= $currentCheckPoint->getCoordonnee() ?></h3>
                    <p><strong>Date de départ</strong> : <?= $currentCheckPoint->getDateDepart() ?></p>
                    <p><strong>Date d'arrivée</strong> : <?= $currentCheckPoint->getDateArrive() ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>