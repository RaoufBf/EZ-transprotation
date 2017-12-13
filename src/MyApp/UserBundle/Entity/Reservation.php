<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="CIN", columns={"CIN"}), @ORM\Index(name="CIN_2", columns={"CIN"}), @ORM\Index(name="num", columns={"num"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\GreaterThan(
     *     value =0,
     *     message ="Erreur !! nbr doit etre superieur a 0"
     * )
     */
    private $nbrPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="paiement", type="string", length=20, nullable=true)
     */
    private $paiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="datetime", nullable=true)
     */
    private $dateReservation;

    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num", referencedColumnName="num")
     * })
     */
    private $num;

    /**
     * @return int
     */
    public function getIdRes()
    {
        return $this->idRes;
    }

    /**
     * @param int $idRes
     */
    public function setIdRes($idRes)
    {
        $this->idRes = $idRes;
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
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return int
     */
    public function getNbrPlace()
    {
        return $this->nbrPlace;
    }

    /**
     * @param int $nbrPlace
     */
    public function setNbrPlace($nbrPlace)
    {
        $this->nbrPlace = $nbrPlace;
    }

    /**
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param string $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
    }

    /**
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @param \DateTime $dateReservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    }

    /**
     * @return \Voyage
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param \Voyage $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }


}


