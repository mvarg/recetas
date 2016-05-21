<?php

namespace RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=85, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Recipe", mappedBy="category")
     */
    private $recipe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recipe = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Category
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
     * Add recipe
     *
     * @param \RecipeBundle\Entity\Recipe $recipe
     * @return Category
     */
    public function addRecipe(\RecipeBundle\Entity\Recipe $recipe)
    {
        $this->recipe[] = $recipe;

        return $this;
    }

    /**
     * Remove recipe
     *
     * @param \RecipeBundle\Entity\Recipe $recipe
     */
    public function removeRecipe(\RecipeBundle\Entity\Recipe $recipe)
    {
        $this->recipe->removeElement($recipe);
    }

    /**
     * Get recipe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecipe()
    {
        return $this->recipe;
    }
}
