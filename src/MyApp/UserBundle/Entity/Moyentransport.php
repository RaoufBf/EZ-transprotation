<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moyentransport
 *
 * @ORM\Table(name="moyentransport")
 * @ORM\Entity
 */
class Moyentransport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_moyen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMoyen;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=20, nullable=false)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite_moyen", type="integer", nullable=false)
     */
    private $capaciteMoyen;

    /**
     * @return int
     */
    public function getIdMoyen()
    {
        return $this->idMoyen;
    }

    /**
     * @param int $idMoyen
     */
    public function setIdMoyen($idMoyen)
    {
        $this->idMoyen = $idMoyen;
    }

    /**
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param string $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getCapaciteMoyen()
    {
        return $this->capaciteMoyen;
    }

    /**
     * @param int $capaciteMoyen
     */
    public function setCapaciteMoyen($capaciteMoyen)
    {
        $this->capaciteMoyen = $capaciteMoyen;
    }
    function __toString()
    {
        return (string) $this->getType();
    }


}

