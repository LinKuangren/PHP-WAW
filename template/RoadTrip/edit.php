<div class="container w-full mt-5">
    <form action="" method="POST" class="w-full" enctype="multipart/form-data">
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nomVoyage">Intitulé</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="nomVoyage" name="nomVoyage" placeholder="Voyage..." value="<?= $data['roadTrip']->getIntitule() ?>" required>
            </div>
        </div>
        <div class="w-4/5 sm:w-3/6 lg:w-2/6 mt-10">
                <label class="block text-gray-700 text-sm font-bold my-2" for="file">Image</label>
                <input class="input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" type="file" id="file" name="file" accept="image/png, image/jpeg" value="<?= $data['roadTrip']->getImage() ?>">
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="typeVehicule">Véhicule</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="typeVehicule" name="typeVehicule" placeholder="Voiture, Moto,..." value="<?= $data['roadTrip']->getTypeVehicule() ?>" required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">Description</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="description" name="description" placeholder="bla bla bla" value="<?= $data['roadTrip']->getDescription() ?>" required>
            </div>
        </div>

        <!-- Checkpoints -->

        <div class="grid grid-cols-4 gap-4 mt-5">
            <?php foreach($data['listeCheckPoint'] as $currentCheckPointKey => $currentCheckPointVal) { ?>
                <div class="card w-46 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title"><?=  $currentCheckPointVal->getNom() ?></h2>
                        <label>
                            Nom
                            <input type="text" placeholder="Nom du checkpoint" name="checkPoint[checkPoint<?=  $currentCheckPointVal->getId() ?>][nom]" value="<?=  $currentCheckPointVal->getNom() ?>" required>
                        </label>
                        <label>
                            <input type="text" placeholder="Coordonnees" name="checkPoint[checkPoint<?=  $currentCheckPointVal->getId() ?>][coordonnees]" value="<?=  $currentCheckPointVal->getCoordonnee() ?>" required>
                        </label>
                        <label>
                            <input type="date" placeholder="Date depart" name="checkPoint[checkPoint<?=  $currentCheckPointVal->getId() ?>][date_depart]" value="<?=  $currentCheckPointVal->getDateDepart() ?>" required>
                        </label>
                        <label>
                            <input type="date" placeholder="Date arrive" name="checkPoint[checkPoint<?=  $currentCheckPointVal->getId() ?>][date_arrive]" value="<?=  $currentCheckPointVal->getDateArrive() ?>" required>
                        </label>
                            <input type="hidden" name="checkPoint[checkPoint<?=  $currentCheckPointVal->getId() ?>][id]"  value="<?=  $currentCheckPointVal->getId() ?>">
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
</div>
