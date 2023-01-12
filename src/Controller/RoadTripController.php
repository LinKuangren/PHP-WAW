<?php

namespace App\Controller;

use App\Entity\Checkpoint;
use App\Manager\CheckpointManager;
use Plugo\Controller\AbstractController;
use App\Entity\RoadTrip;
use App\Manager\RoadTripManager;
use Plugo\Services\ImageUploader\ImageUploader;
use Plugo\Services\FlashMessage\FlashMessage;

class RoadTripController extends AbstractController {

    public function __construct() {
        $this->flashMessage = new FlashMessage();
        $this->flashMessage->clearFlashMessage();
    }

    /**
     * Afficher toute les roadtrips
     * @return string
     */
    public function allRoadTrip() {
        $roadTripManager = new RoadTripManager();
        $listeRoadTrip = $roadTripManager->findAll();
        return $this->renderView('RoadTrip/index.php', ['listeRoadTrip' => $listeRoadTrip]);
    }

    /**
     * Utilisateur qui peux créer un roadtrip et des checkpoints
     * @return string|null
     */
    public function addRoadTrip() {
        $roadTripManager = new RoadTripManager();
        
        if(isset($_POST) && !empty($_POST)){
            if(empty($_POST['checkPoint']) || empty($_POST['checkPoint']['checkPointDepart']) || empty($_POST['checkPoint']['checkPointArrive'])){
                $this->flashMessage->generateFlashMessage('CheckpointError', 'Error', 'Le point de départ et/ou d\'arrivée n\'as pas été défini');
                return $this->redirectToRoute('addRoadTrip');
            }else{
                $roadTrip = new RoadTrip();
                $roadTrip->setIntitule($_POST['nomVoyage']);
                $roadTrip->setTypeVehicule($_POST['typeVehicule']);
                if(isset($_FILES['file']) && !empty($_FILES['file'])){
                    $folderName = uniqid($_SESSION['user']['id']);
                    $imageUploader = new ImageUploader();
                    $result = $imageUploader->uploadPicture($_FILES, $folderName);
                    if($result){
                        $roadTrip->setImage($result);
                    }
                }
                $roadTrip->setDescription($_POST['description']);
                $roadTrip->setUserId($_SESSION['user']['id']);
                $roadTrip->setCreatedAt(date('Y-m-d H:i:s'));
                $roadTripManager->add($roadTrip);

                foreach($_POST['checkPoint'] as $currentCheckPoint){
                    $checkPoint = new Checkpoint();
                    $checkPointManager = new CheckpointManager();
                    $checkPoint->setNom($currentCheckPoint['nom']);
                    $checkPoint->setCoordonnee($currentCheckPoint['coordonnees']);
                    $checkPoint->setDateDepart($currentCheckPoint['date_depart']);
                    $checkPoint->setDateArrive($currentCheckPoint['date_arrive']);
                    $checkPoint->setRoadtrip($roadTripManager->findBy([], ['id' => 'DESC'], 1)[0]->getId());

                    $checkPointManager->add($checkPoint);
                }
            }
            return $this->redirectToRoute('allRoadTrip');
        }
        return $this->renderView('RoadTrip/add.php');
    }

    /**
     * Affichage des détails d'un roadtrip
     * @return null
     */
    public function detailsRoadTrip() {
        $roadTripManager = new RoadTripManager();
        $checkPointManager = new CheckpointManager();

        $roadTrip = $roadTripManager->findBy(['id' => $_GET['id']]);
        $listeCheckPoint = $checkPointManager->findBy(['roadtrip_id' => $_GET['id']]);

        return $this->renderView('RoadTrip/details.php', ['roadTrip' => $roadTrip, 'listeCheckPoint' => $listeCheckPoint]);
    }

    /**
     * Suppression d'un roadtrip et de ses checkpoint de l'utilisateur
     * @return null
     */
    public function removeRoadTrip() {
        $roadTripManager = new RoadTripManager();
        $checkPointManager = new CheckpointManager();

        $roadTrip = $roadTripManager->findBy(['id' => $_GET['id']]);

        if($roadTrip[0]->getUser()->getId() == $_SESSION['user']['id']){
            $listeCheckPoint = $checkPointManager->findBy(['roadtrip_id' => $_GET['id']]);
            if(!empty($listeCheckPoint)){
                foreach($listeCheckPoint as $currentCheckPoint){
                    $checkPointManager->remove($currentCheckPoint);
                }
            }
            $roadTripManager->remove($roadTrip[0]);
            $this->flashMessage->generateFlashMessage('SuppressionSuccess', 'Success', 'Le roadtrip et ses checkpoint ont bien été supprimés');
            return $this->redirectToRoute('allRoadTrip');
        }else{
            $this->flashMessage->generateFlashMessage('NotSameUser', 'Error', 'Vous ne pouvez pas supprimer ce roadtrip, seul le créateur de ce roadtrip peut effectuer cette action');
            return $this->redirectToRoute('allRoadTrip');
        }
    }

    public function updateRoadTrip() {
        $roadTripManager = new RoadTripManager();
        $checkPointManager = new CheckpointManager();

        $roadTrip = $roadTripManager->findOneBy(['id' => $_GET['id']]);

        if($roadTrip->getUser()->getId() == $_SESSION['user']['id']){

            if(isset($_POST) && !empty($_POST)){
                foreach($_POST['checkPoint'] as $currentCheckPoint){
                    $checkPoint = $checkPointManager->findOneBy(['id' => $currentCheckPoint['id']]);
                    $checkPoint->setNom($currentCheckPoint['nom']);
                    $checkPoint->setCoordonnee($currentCheckPoint['coordonnees']);
                    $checkPoint->setDateDepart($currentCheckPoint['date_depart']);
                    $checkPoint->setDateArrive($currentCheckPoint['date_arrive']);

                    $checkPointManager->edit($checkPoint);
                }

                $roadTrip->setIntitule($_POST['nomVoyage']);
                $roadTrip->setTypeVehicule($_POST['typeVehicule']);
                if(isset($_FILES['file']) && !empty($_FILES['file'])){
                    $folderName = uniqid($_SESSION['user']['id']);
                    $imageUploader = new ImageUploader();
                    $result = $imageUploader->uploadPicture($_FILES, $folderName);
                    if($result){
                        $roadTrip->setImage($result);
                    }
                }
                $roadTrip->setDescription($_POST['description']);
                $roadTripManager->edit($roadTrip);
                $this->flashMessage->generateFlashMessage('RoadTripUpdate', 'Success', 'Roadtrip modifié');
                return $this->redirectToRoute('detailsRoadTrip', ['id' => $roadTrip->getId()]);
            }
            $listeCheckPoint = $checkPointManager->findBy(['roadtrip_id' => $_GET['id']]);
            return $this->renderView('RoadTrip/edit.php', ['roadTrip' => $roadTrip, 'listeCheckPoint' => $listeCheckPoint]);
        }else{
            $this->flashMessage->generateFlashMessage('NotSameUser', 'Error', 'Vous ne pouvez pas supprimer ce roadtrip, seul le créateur de ce roadtrip peut effectuer cette action');
            return $this->redirectToRoute('allRoadTrip');
        }
    }

}