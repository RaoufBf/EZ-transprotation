<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreclamation;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="string", length=500, nullable=true)
     */
    private $msg;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=20, nullable=false)
     */
    private $pseudo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReclamation", type="datetime", nullable=false)
     */
    private $datereclamation;

    /**
     * @return int
     */
    public function getIdreclamation()
    {
        return $this->idreclamation;
    }

    /**
     * @param int $idreclamation
     */
    public function setIdreclamation($idreclamation)
    {
        $this->idreclamation = $idreclamation;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return \DateTime
     */
    public function getDatereclamation()
    {
        return $this->datereclamation;
    }

    /**
     * @param \DateTime $datereclamation
     */
    public function setDatereclamation($datereclamation)
    {
        $this->datereclamation = $datereclamation;
    }


}

