<?php

namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\RoadTrip;

class RoadTripManager extends AbstractManager {

    /**
     * @param RoadTrip $roadTrip
     * @return \PDOStatement
     */
    public function add(RoadTrip $roadTrip): \PDOStatement
    {
        return $this->create(RoadTrip::class, [
            'intitule' => $roadTrip->getIntitule(),
            'type_vehicule' => $roadTrip->getTypeVehicule(),
            'image' => $roadTrip->getImage(),
            'description' => $roadTrip->getDescription(),
            'user_id' => $roadTrip->getUserId(),
            'created_at' => $roadTrip->getCreatedAt(),
        ]);
    }

    /**
     * @param array $clause
     * @return mixed
     */
    public function findOneBy(array $clause) {
        return $this->readOne(RoadTrip::class, $clause);
    }

    /**
     * @return array|false|null
     */
    public function findAll() {
        return $this->readMany(RoadTrip::class);
    }


    public function findBy(array $clause = [], array $orderBy = [], int $limit = null, int $offset = null) {
        return $this->readMany(RoadTrip::class, $clause, $orderBy, $limit, $offset);
    }

    /**
     * @param RoadTrip $roadTrip
     * @return \PDOStatement
     */
    public function edit(RoadTrip $roadTrip): \PDOStatement
    {
        return $this->update(RoadTrip::class, [
            'intitule' => $roadTrip->getIntitule(),
            'type_vehicule' => $roadTrip->getTypeVehicule(),
            'user_id' => $roadTrip->getUserId(),
        ], $roadTrip->getId());
    }

    /**
     * @param RoadTrip $roadTrip
     * @return \PDOStatement
     */
    public function remove(RoadTrip $roadTrip): \PDOStatement
    {
        return $this->delete(RoadTrip::class, $roadTrip->getId());
    }

}