<?php

namespace App\Entity;

use App\Manager\RoadTripManager;
use App\Entity\RoadTrip;

class Checkpoint {

    public function __construct() {
        $this->roadTrip = new RoadTripManager();
    }

    private ?int $id;
    private ?string $nom;
    private ?string $coordonnee;
    private $date_depart;
    private $date_arrive;
    private ?int $roadtrip_id;
    private ?int $user_id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string|null
     */
    public function getCoordonnee(): ?string
    {
        return $this->coordonnee;
    }

    /**
     * @param string|null $coordonnee
     */
    public function setCoordonnee(?string $coordonnee): void
    {
        $this->coordonnee = $coordonnee;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart): void
    {
        $this->date_depart = $date_depart;
    }

    /**
     * @return mixed
     */
    public function getDateArrive()
    {
        return $this->date_arrive;
    }

    /**
     * @param mixed $date_arrive
     */
    public function setDateArrive($date_arrive): void
    {
        $this->date_arrive = $date_arrive;
    }

    /**
     * @return RoadTrip|null
     */
    public function getRoadtripId(): ?RoadTrip
    {
        return $this->roadTrip->findOneBy(['id' => $this->roadtrip_id]);
    }

    /**
     * @param $roadtrip_id
     */
    public function setRoadtripId($roadtrip_id): void
    {
        $this->roadtrip_id = $roadtrip_id;
    }

    /**
     * @return User|null
     */
    public function getUserpId(): ?User
    {
        return $this->user->findOneBy(['id' => $this->user_id]);
    }

    /**
     * @param $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }




}