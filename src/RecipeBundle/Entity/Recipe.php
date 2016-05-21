<?php

namespace RecipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table(name="recipe", indexes={@ORM\Index(name="fk_recetas_usuario1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Recipe
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="difficulty", type="integer", nullable=false)
     */
    private $difficulty;

    /**
     * @var integer
     *
     * @ORM\Column(name="portion", type="integer", nullable=false)
     */
    private $portion;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", nullable=false)
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="recipe")
     * @ORM\JoinTable(name="recipe_has_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="recipe")
     * @ORM\JoinTable(name="recipe_has_ingredient",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     *   }
     * )
     */
    private $ingredient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredient = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Recipe
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
     * Set description
     *
     * @param string $description
     * @return Recipe
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
     * Set difficulty
     *
     * @param integer $difficulty
     * @return Recipe
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return integer 
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set portion
     *
     * @param integer $portion
     * @return Recipe
     */
    public function setPortion($portion)
    {
        $this->portion = $portion;

        return $this;
    }

    /**
     * Get portion
     *
     * @return integer 
     */
    public function getPortion()
    {
        return $this->portion;
    }

    /**
     * Set rate
     *
     * @param integer $rate
     * @return Recipe
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return integer 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Recipe
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Recipe
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Recipe
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Recipe
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Recipe
     */
    public function setUser($user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add category
     *
     * @param \RecipeBundle\Entity\Category $category
     * @return Recipe
     */
    public function addCategory(\RecipeBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \RecipeBundle\Entity\Category $category
     */
    public function removeCategory(\RecipeBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add ingredient
     *
     * @param \RecipeBundle\Entity\Ingredient $ingredient
     * @return Recipe
     */
    public function addIngredient(\RecipeBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredient[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \RecipeBundle\Entity\Ingredient $ingredient
     */
    public function removeIngredient(\RecipeBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredient->removeElement($ingredient);
    }

    /**
     * Get ingredient
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
}
