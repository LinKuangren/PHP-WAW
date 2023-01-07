<?php

namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\Checkpoint;

class CheckpointManager extends AbstractManager {

    /**
     * @param Checkpoint $checkpoint
     * @return \PDOStatement
     */
    public function add(Checkpoint $checkpoint): \PDOStatement
    {
        return $this->create(Checkpoint::class, [
            'nom' => $checkpoint->getNom(),
            'coordonnee' => $checkpoint->getCoordonnee(),
            'date_depart' => $checkpoint->getDateArrive(),
            'date_arrive' => $checkpoint->getDateDepart(),
            'roadtrip_id' => $checkpoint->getRoadtripId()->getId(),
            
        ]);
    }

    /**
     * @param array $clause
     * @return mixed
     */
    public function findOneBy(array $clause) {
        return $this->readOne(Checkpoint::class, $clause);
    }

    /**
     * @return array|false|null
     */
    public function findAll() {
        return $this->readMany(Checkpoint::class);
    }

    /**
     * @param array|null $clause
     * @param array|null $orderBy
     * @return array|false|null
     */
    public function findBy(array $clause = [], array $orderBy = [], int $limit = null, int $offset = null) {
        return $this->readMany(Checkpoint::class, $clause, $orderBy, $limit, $offset);
    }

    /**
     * @param Checkpoint $checkpoint
     * @return \PDOStatement
     */
    public function edit(Checkpoint $checkpoint): \PDOStatement
    {
        return $this->update(Checkpoint::class, [
            'nom' => $checkpoint->getNom(),
            'coordonnee' => $checkpoint->getCoordonnee(),
            'date_depart' => $checkpoint->getDateArrive(),
            'date_arrive' => $checkpoint->getDateDepart(),
            'roadtrip_id' => $checkpoint->getRoadtripId()->getId(),
        ], $checkpoint->getId());
    }

    /**
     * @param Checkpoint $checkpoint
     * @return \PDOStatement
     */
    public function remove(Checkpoint $checkpoint): \PDOStatement
    {
        return $this->delete(Checkpoint::class, $checkpoint->getId());
    }

}