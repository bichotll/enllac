<?php

namespace Bic\EnllacBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Link
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
     * @ORM\Column(name="enllac", type="string", length=255)
     */
    private $enllac;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="text")
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_url", type="string", length=255)
     */
    private $iconUrl;

    /**
     * @ORM\ManyToMany(targetEntity="Repo", mappedBy="repos")
     **/
    private $repos;

    public function __construct(){
        $this->repos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tags")
     * @ORM\JoinTable(name="links_tags",
     *      joinColumns={@ORM\JoinColumn(name="link_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     **/
    protected $tags;



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
     * Set enllac
     *
     * @param string $enllac
     * @return Link
     */
    public function setEnllac($enllac)
    {
        $this->enllac = $enllac;
    
        return $this;
    }

    /**
     * Get enllac
     *
     * @return string 
     */
    public function getEnllac()
    {
        return $this->enllac;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Link
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set descrip
     *
     * @param string $descrip
     * @return Link
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
     * Set iconUrl
     *
     * @param string $iconUrl
     * @return Link
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
    
        return $this;
    }

    /**
     * Get iconUrl
     *
     * @return string 
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
    }
}
