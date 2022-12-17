<?php

namespace App\Entity;

use App\Entity\User;
use App\Manager\UserManager;

class RoadTrip {

    public function __construct() {
        $this->userManager = new UserManager();
    }

    private ?int $id;
    private ?string $intitule;
    private ?string $type_vehicule;
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
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param string|null $intitule
     */
    public function setIntitule(?string $intitule): void
    {
        $this->intitule = $intitule;
    }

    /**
     * @return string|null
     */
    public function getTypeVehicule(): ?string
    {
        return $this->type_vehicule;
    }

    /**
     * @param string|null $type_vehicule
     */
    public function setTypeVehicule(?string $type_vehicule): void
    {
        $this->type_vehicule = $type_vehicule;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    /**
     * @return \App\Entity\User
     */
    public function getUser(): ?User {
        return $this->userManager->findOneBy(['id' => $this->user_id]);
    }

    /**
     * @param $user_id
     * @return void
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }



}