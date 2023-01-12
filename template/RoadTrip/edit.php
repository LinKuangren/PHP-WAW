<h1 class="text-4xl text-center mb-12 mt-12">Modifier un road trip</h1>
<form action="" method="POST" class="w-full place-items-center">
    <h2 class="flex md:items-center mb-6 justify-center text-3xl">Informations générales</h2>
    <hr class="mb-6">
    <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
        <div class="md:w-1/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                   for="nomVoyage">Intitulé</label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   type="text" id="nomVoyage" name="nomVoyage" placeholder="Voyage..."
                   value="<?= $data['roadTrip']->getIntitule() ?>" required>
        </div>
    </div>

    <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
        <div class="md:w-1/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="file">Image</label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="file" id="file" name="file" accept="image/png, image/jpeg" value="<?= $data['roadTrip']->getImage() ?>">
        </div>
    </div>
    <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
        <div class="md:w-1/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="typeVehicule">Véhicule</label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   type="text" id="typeVehicule" name="typeVehicule" placeholder="Voiture, Moto,..."
                   value="<?= $data['roadTrip']->getTypeVehicule() ?>" required>
        </div>
    </div>

    <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
        <div class="md:w-1/6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">Description</label>
        </div>
        <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   type="text" id="description" name="description" placeholder="bla bla bla"
                   value="<?= $data['roadTrip']->getDescription() ?>" required>
        </div>
    </div>

    <!-- Checkpoints -->
    <h2 class="flex md:items-center mb-6 justify-center text-3xl">Check-points</h2>
    <hr>
    <div class="flex md:flex-row md:flex-wrap  justify-center gap-4 mt-5 max-[600px]:flex-col m-4">
        <?php foreach ($data['listeCheckPoint'] as $currentCheckPointKey => $currentCheckPointVal) { ?>
            <div class="card w-46 bg-base-100 shadow-xl bg-[#FEEFDD]">
                <div class="card-body">
                    <h3 class="card-title border-double border-b-2 border-black"><?= $currentCheckPointVal->getNom() ?></h3>
                    <label class="flex flex-col">
                        Nom
                        <input type="text" placeholder="Nom du checkpoint"
                               name="checkPoint[checkPoint<?= $currentCheckPointVal->getId() ?>][nom]"
                               value="<?= $currentCheckPointVal->getNom() ?>"
                               class="rounded-md border-gray-400 border-2" required>
                    </label>
                    <label class="flex flex-col">Coordonnées du road trip
                        <input type="text" placeholder="Coordonnees"
                               name="checkPoint[checkPoint<?= $currentCheckPointVal->getId() ?>][coordonnees]"
                               value="<?= $currentCheckPointVal->getCoordonnee() ?>"
                               class="rounded-md border-gray-400 border-2" required>
                    </label>
                    <label class="flex flex-col">Date de départ
                        <input type="date" placeholder="Date depart"
                               name="checkPoint[checkPoint<?= $currentCheckPointVal->getId() ?>][date_depart]"
                               value="<?= $currentCheckPointVal->getDateDepart() ?>"
                               class="rounded-md border-gray-400 border-2" required>
                    </label>
                    <label class="flex flex-col">Date d'arrivée
                        <input type="date" placeholder="Date arrive"
                               name="checkPoint[checkPoint<?= $currentCheckPointVal->getId() ?>][date_arrive]"
                               value="<?= $currentCheckPointVal->getDateArrive() ?>"
                               class="rounded-md border-gray-400 border-2" required>
                    </label>
                    <input type="hidden" name="checkPoint[checkPoint<?= $currentCheckPointVal->getId() ?>][id]"
                           value="<?= $currentCheckPointVal->getId() ?>">
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="flex md:items-center justify-center m-6">
        <button class="shadow bg-[#6699CC] hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit">
            Enregistrer
        </button>
    </div>
</form>
