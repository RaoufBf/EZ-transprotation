<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="idOffre", columns={"idOffre"}), @ORM\Index(name="pseudo", columns={"pseudo"})})
 * @ORM\Entity
 */
class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idinscription", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinscription;

    /**
     * @var integer
     *
     * @ORM\Column(name="idOffre", type="integer", nullable=false)
     */
    private $idoffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="pseudo", type="integer", nullable=false)
     */
    private $pseudo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime", nullable=true)
     */
    private $dateinscription;

    /**
     * @return int
     */
    public function getIdinscription()
    {
        return $this->idinscription;
    }

    /**
     * @param int $idinscription
     */
    public function setIdinscription($idinscription)
    {
        $this->idinscription = $idinscription;
    }

    /**
     * @return int
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }

    /**
     * @param int $idoffre
     */
    public function setIdoffre($idoffre)
    {
        $this->idoffre = $idoffre;
    }

    /**
     * @return int
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param int $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return \DateTime
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * @param \DateTime $dateinscription
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;
    }


}

