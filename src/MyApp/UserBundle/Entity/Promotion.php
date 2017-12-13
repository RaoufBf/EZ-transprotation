<?php

namespace MyApp\UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion", indexes={@ORM\Index(name="num", columns={"num"})})
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPromo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpromo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrjm", type="integer", nullable=true)
     */
    private $nbrjm;

    /**
     * @var string
     *
     * @ORM\Column(name="imageProm", type="string", length=255, nullable=false)
     */
    private $imageprom;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProm", type="string", length=255, nullable=false)
     */
    private $nomprom;

    /**
     * @return int
     */
    /**
     * @var \Voyage
     *
     * @ORM\ManyToOne(targetEntity="Voyage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num", referencedColumnName="num")
     * })
     */
    private $num;
    public function getIdpromo()
    {
        return $this->idpromo;
    }

    /**
     * @param int $idpromo
     */
    public function setIdpromo($idpromo)
    {
        $this->idpromo = $idpromo;
    }

    /**
     * @return int
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param int $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return float
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * @param float $pourcentage
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;
    }

    /**
     * @return int
     */
    public function getNbrjm()
    {
        return $this->nbrjm;
    }

    /**
     * @param int $nbrjm
     */
    public function setNbrjm($nbrjm)
    {
        $this->nbrjm = $nbrjm;
    }

    /**
     * @return string
     */
    public function getImageprom()
    {
        return $this->imageprom;
    }

    /**
     * @param string $imageprom
     */
    public function setImageprom($imageprom)
    {
        $this->imageprom = $imageprom;
    }

    /**
     * @return string
     */
    public function getNomprom()
    {
        return $this->nomprom;
    }

    /**
     * @param string $nomprom
     */
    public function setNomprom($nomprom)
    {
        $this->nomprom = $nomprom;
    }


}

