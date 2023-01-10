<h1 class="text-4xl text-center mt-12">Détails du road trip - <?= $data['roadTrip'][0]->getIntitule() ?></h1>
<span class="text-xs text-center flex justify-center mb-12">Créé par <?= $data['roadTrip'][0]->getUser()->getEmail() ?></span>
<div class="container w-full mt-5">
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
                    <div class="flex md:items-center justify-center">
                        <a href="/index.php?page=removeCheckPoint&id=<?= $currentCheckPoint->getId() ?>&id_roadtrip=<?= $data['roadTrip'][0]->getId() ?>"
                           class="bg-[#ED6A5A] w-28 shadow hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Supprimer
                        </a>
                    </div>
                    <h3 class="card-title border-double border-b-2 border-black"><?= $currentCheckPoint->getNom() ?></h3>
                    <h4><strong>Adresse</strong> : <?= $currentCheckPoint->getCoordonnee() ?></h4>
                    <h4><strong>Date de départ</strong> : <?= $currentCheckPoint->getDateDepart() ?></h4>
                    <h4><strong>Date d'arrivée</strong> : <?= $currentCheckPoint->getDateArrive() ?></h4>
                </div>
            </div>
        <?php } ?>
    </div>
</div>