<?php

namespace Bic\EnllacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tag
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
     * @ORM\ManyToMany(targetEntity="Link", mappedBy="links")
     **/
    private $links;

    /**
     * @ORM\ManyToMany(targetEntity="Repo", mappedBy="repos")
     **/
    private $repos;

    public function __construct(){
        $this->repos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Tag
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
    public function setRepos(ArrayCollection $repos)
    {
        $this->repos = $repos;

        return $this;
    }
}
