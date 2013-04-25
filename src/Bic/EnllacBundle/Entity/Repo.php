<?php

namespace Bic\EnllacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Repo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Repo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=255)
     */
    private $descrip;

    /**
     * @ORM\ManyToMany(targetEntity="Link", inversedBy="links")
     * @ORM\JoinTable(name="repos_links",
     *      joinColumns={@ORM\JoinColumn(name="repo_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id")}
     *      )
     **/
    protected $links;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tags")
     * @ORM\JoinTable(name="repos_tags",
     *      joinColumns={@ORM\JoinColumn(name="repo_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     **/
    protected $tags;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="users")
     **/
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="usersFl")
     **/
    private $usersFl;

    public function __construct(){
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usersFl = new \Doctrine\Common\Collections\ArrayCollection();
    }
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Repo
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     * @return Repo
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    
        return $this;
    }

    /**
     * Get descrip
     *
     * @return string 
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of links.
     *
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the value of links.
     *
     * @param mixed $links the links
     *
     * @return self
     */
    public function setLinks(ArrayCollection $links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Gets the value of tags.
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the value of tags.
     *
     * @param mixed $tags the tags
     *
     * @return self
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Gets the value of users.
     *
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Sets the value of users.
     *
     * @param mixed $users the users
     *
     * @return self
     */
    public function setUsers(ArrayCollection $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Gets the value of usersFl.
     *
     * @return mixed
     */
    public function getUsersFl()
    {
        return $this->usersFl;
    }

    /**
     * Sets the value of usersFl.
     *
     * @param mixed $usersFl the usersFl
     *
     * @return self
     */
    public function setUsersFl(ArrayCollection $usersFl)
    {
        $this->usersFl = $usersFl;

        return $this;
    }
}
