<div class="h-[60vh] md:h-[91vh] flex flex-col justify-end items-center text-[#000] bg-[url('../public/img/imgHeader/imgFond.jpeg')] w-full relative bg-cover bg-no-repeat ">
    <h1 class="font-bold absolute top-52 text-2xl md:text-6xl">Liste des road trips</h1>
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

<h1 class="max-[600px]:text-center text-black p-8 font-bold text-xl md:text-3xl">Publications</h1>
<div class="grid md:p-10 md:grid-cols-3 grid-cols-1 gap-8 max-[600px]:p-5">
    <?php foreach($data['listeRoadTrip'] as $index => $currentRoadTrip) { ?>
        <?php $checkpoint = $currentRoadTrip->getAllCheckpoint($currentRoadTrip->getId()); ?>
        <div class="card w-auto bg-[#FEEFDD] text-black shadow-xl w-43">
            <div class="card-body ">
                <div class="flex justify-center w-full h-auto ">
                    <a href="detailsRoadTrip/<?= $currentRoadTrip->getId() ?>">
                    <img alt="Placeholder" class="block h-auto w-full" src="<?= $currentRoadTrip->getImage() != null ? $currentRoadTrip->getImage() : "https://picsum.photos/1920/1080/?random" ?>">
</a>
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