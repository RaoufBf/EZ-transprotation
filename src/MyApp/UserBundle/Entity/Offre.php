<?php

namespace MyApp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="num", columns={"num"}), @ORM\Index(name="num_2", columns={"num"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="MyApp\UserBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idOffre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomOffre", type="string", length=100, nullable=false)
     */
    public $nomoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentage;

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
     * @var string
     *
     * @ORM\Column(name="imageoffre", type="string", length=500, nullable=true)
     */
    public $imageoffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrjm", type="integer", nullable=true)
     */
    private $nbrjm;

    /**
     * @var integer
     *
     * @ORM\Column(name="pointfidelite", type="integer", nullable=false)
     */
    private $pointfidelite;

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
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file=null )
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->imageoffre
            ? null
            : $this->getUploadRootDir().'/'.$this->imageoffre;
    }

    public function getWebPath()
    {
        return null === $this->imageoffre
            ? null
            : $this->getUploadDir().'/'.$this->imageoffre;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '_uploads/documents';
    }
    /**
     * Get idoffre
     *
     * @return integer
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }

    /**
     * Set idoffre
     *
     * @param string idoffre
     *
     * @return integer
     */
    public function setIdoffre()
    {
        return $this->idoffre;
    }

    /**
     * Set nomoffre
     *
     * @param string $nomoffre
     *
     * @return Offre
     */
    public function setNomoffre($nomoffre)
    {
        $this->nomoffre = $nomoffre;

        return $this;
    }

    /**
     * Get nomoffre
     *
     * @return string
     */
    public function getNomoffre()
    {
        return $this->nomoffre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pourcentage
     *
     * @param float $pourcentage
     *
     * @return Offre
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return float
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Offre
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Offre
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set imageoffre
     *
     * @param string $imageoffre
     *
     * @return Offre
     */
    /*public function setImageoffre($imageoffre)
    {
        $this->imageoffre = $imageoffre;

        return $this;
    }

    /**
     * Get imageoffre
     *
     * @return string
     */
    /* public function getImageoffre()
     {
         return $this->imageoffre;
     }*/

    /**
     * Set nbrjm
     *
     * @param integer $nbrjm
     *
     * @return Offre
     */
    public function setNbrjm($nbrjm)
    {
        $this->nbrjm = $nbrjm;

        return $this;
    }

    /**
     * Get nbrjm
     *
     * @return integer
     */
    public function getNbrjm()
    {
        return $this->nbrjm;
    }

    /**
     * Set pointfidelite
     *
     * @param integer $pointfidelite
     *
     * @return Offre
     */
    public function setPointfidelite($pointfidelite)
    {
        $this->pointfidelite = $pointfidelite;

        return $this;
    }

    /**
     * Get pointfidelite
     *
     * @return integer
     */
    public function getPointfidelite()
    {
        return $this->pointfidelite;
    }

    /**
     * Set num
     *
     * @param \MyApp\UserBundle\Entity\Voyage $num
     *
     * @return Offre
     */
    public function setNum(\MyApp\UserBundle\Entity\Voyage $num = null)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return \MyApp\UserBundle\Entity\Voyage
     */
    public function getNum()
    {
        return $this->num;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move($this->getUploadRootDir(), $this->getFile()->getClientOriginalName());

        // set the imageoffre property to the filename where you've saved the file
        $this->imageoffre = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

}
