<div class="h-96 flex flex-col justify-end items-center text-[#FFFF] bg-[url('https://picsum.photos/200')] w-full relative">
    <h1 class="font-bold absolute top-52">Liste des road trips</h1>
    <div class="flex">
        <a href="#">
            <img src="https://img.icons8.com/color/48/null/facebook.png" alt="Logo de Facebook"/>
        </a>
        <a href="#">
            <img src="https://img.icons8.com/fluency/48/null/instagram-new.png" alt="Logo d'Instagram"/>
        </a>
        <a href="#">
            <img src="https://img.icons8.com/color/48/null/twitter-squared.png" alt="Logo de Twitter"/>
        </a>
    </div>
</div>
<h1 class="max-[600px]:text-center  text-black p-8 font-bold">Publications récentes</h1>
<div>

</div>
<h1 class="max-[600px]:text-center text-black p-8 font-bold">Publications</h1>
<div class="grid md:p-10 md:grid-cols-3 max-[600px]:grid-cols-1 gap-4 max-[600px]:p-5">
    <?php foreach($data['listeRoadTrip'] as $index => $currentRoadTrip) { ?>
        <?php $checkpoint = $currentRoadTrip->getAllCheckpoint($currentRoadTrip->getId()); ?>
        <div class="card w-46 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="flex justify-center w-full h-44">
                    <img class="w-full " src="https://picsum.photos/200" alt="">
                </div>
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

                <div class="grid grid-cols-3 max-[600px]:grid-cols-1 justify-center items-center gap-5">
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