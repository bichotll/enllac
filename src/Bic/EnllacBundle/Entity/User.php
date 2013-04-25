<?php

namespace Bic\EnllacBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table()
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
     * @ORM\ManyToMany(targetEntity="Repo", inversedBy="reposFl")
     * @ORM\JoinTable(name="reposFl_users",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repo_id", referencedColumnName="id")}
     *      )
     **/
    protected $reposFl;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFlUsers")
     **/
    private $usersFlBy;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="usersFlBy")
     * @ORM\JoinTable(name="user_fl_user",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     **/
    private $myFlUsers;

    public function __construct(){
        $this->repos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reposFl = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Gets the value of repos.
     *
     * @return mixed
     */
    public function getRepos()
    {
        return $this->repos;
    }

    /**
     * Sets the value of repos.
     *
     * @param mixed $repos the repos
     *
     * @return self
     */
    public function setRepos($repos)
    {
        $this->repos = $repos;

        return $this;
    }

    /**
     * Gets the value of reposFl.
     *
     * @return mixed
     */
    public function getReposFl()
    {
        return $this->reposFl;
    }

    /**
     * Sets the value of reposFl.
     *
     * @param mixed $reposFl the reposFl
     *
     * @return self
     */
    public function setReposFl($reposFl)
    {
        $this->reposFl = $reposFl;

        return $this;
    }

    /**
     * Gets the value of usersFlBy.
     *
     * @return mixed
     */
    public function getUsersFlBy()
    {
        return $this->usersFlBy;
    }

    /**
     * Sets the value of usersFlBy.
     *
     * @param mixed $usersFlBy the usersFlBy
     *
     * @return self
     */
    public function setUsersFlBy($usersFlBy)
    {
        $this->usersFlBy = $usersFlBy;

        return $this;
    }

    /**
     * Gets the value of myFlUsers.
     *
     * @return mixed
     */
    public function getMyFlUsers()
    {
        return $this->myFlUsers;
    }

    /**
     * Sets the value of myFlUsers.
     *
     * @param mixed $myFlUsers the myFlUsers
     *
     * @return self
     */
    public function setMyFlUsers($myFlUsers)
    {
        $this->myFlUsers = $myFlUsers;

        return $this;
    }
}