<?php

namespace Bic\EnllacBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="bic_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", name="descrip", nullable=true)
     */
    protected $descrip;

    /**
     * @ORM\Column(type="string", name="image", length=100, unique=false, nullable=true)
     *
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 400,
     *     minHeight = 100,
     *     maxHeight = 400
     * )
     */
    protected $image = null;

    /**
     * @ORM\ManyToMany(targetEntity="Repo", inversedBy="repos")
     * @ORM\JoinTable(name="repos_users",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repo_id", referencedColumnName="id")}
     *      )
     **/
    protected $repos;

    /**
     * @ORM\ManyToMany(targetEntity="Repo", inversedBy="repos_fl")
     * @ORM\JoinTable(name="repos_fl_users",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repo_id", referencedColumnName="id")}
     *      )
     **/
    protected $repos_fl;

    public function __construct(){
        $this->repos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->repos_fl = new \Doctrine\Common\Collections\ArrayCollection();
        parent::__construct();
    }


    public function getImageAbsolutePath()
    {
        return null === $this->image
            ? null
            : $this->getImageUploadRootDir().'/'.$this->image;
    }

    public function getImageWebPath()
    {
        return null === $this->image
            ? null
            : $this->getImageUploadDir().'/'.$this->image;
    }

    public function getImageUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getImageUploadDir();
    }

    public function getImageUploadDir()
    {
        // getImage rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }
    

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of descrip.
     *
     * @return mixed
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Sets the value of descrip.
     *
     * @param mixed $descrip the descrip
     *
     * @return self
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Gets the value of image.
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the value of image.
     *
     * @param mixed $image the image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}