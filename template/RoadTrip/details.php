<div class="relative w-full md:h-[91vh] sd:h-[50vh]">
    <img src="<?= $data['roadTrip'][0]->getImage() != null ? $data['roadTrip'][0]->getImage() : "https://picsum.photos/1920/1080/?random" ?>" class="w-full opacity-60 lg:h-full h-[50vh] lg:object-fill object-none" alt="background-liste-roadtrips"/>
    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center flex-col">
        <h1 class="text-4xl font-medium text-gray-900 text-center mt-12">Détails du road trip - <?= $data['roadTrip'][0]->getIntitule() ?></h1>
        <span class="text-lg text-gray-900 sm:text-center lg:text-left mt-2">Créé par <?= $data['roadTrip'][0]->getUser()->getEmail() ?></span>
    </div>
</div>
<div class="mt-12 mb-12">
    <h2 class="flex md:items-center mb-6 justify-center text-3xl">Informations générales</h2>
    <hr class="mb-6">
    <div class="flex md:justify-evenly max-[600px]:m-6 max-[600px]:flex-col">
        <div class="md:flex md:mb-6 flex-col max-[600px]:m-6">
            <div class="text-gray-500 font-bold text-left text-xl">
                Véhicule
            </div>
            <div class="text-left">
                <?= $data['roadTrip'][0]->getTypeVehicule() ?>
            </div>
        </div>
        <div class="md:flex md:mb-6 flex-col max-[600px]:ml-6 mb-1">
            <div class="text-gray-500 font-bold text-left text-xl">
                Description
            </div>
            <div class="text-left">
                <?= $data['roadTrip'][0]->getDescription() ?>
            </div>
        </div>
    </div>
    <h2 class="flex md:items-center mb-6 justify-center text-3xl">Check-points</h2>
    <hr class="mb-6">
    <div class="flex md:flex-row md:flex-wrap  justify-center gap-4 mt-5 max-[600px]:flex-col m-4">
        <?php foreach ($data['listeCheckPoint'] as $currentCheckPoint) { ?>
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