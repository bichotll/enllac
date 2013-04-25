<?php

namespace Bic\EnllacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity="User", mappedBy="users_fl")
     **/
    private $users_fl;

    public function __construct(){
        $this->links = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users_fl = new \Doctrine\Common\Collections\ArrayCollection();
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
}
