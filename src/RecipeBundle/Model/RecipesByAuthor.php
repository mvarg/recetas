<?php namespace RecipeBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

class RecipesByAuthor
{
    private $repository;

    /**
     * RecipesByAuthor constructor.
     * @param $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->repository = $om->getRepository('RecipeBundle:Recipe');
    }

    public function getRecipsByAuthorId($authorId)
    {
        return $this->repository->findByUser($authorId);
    }
}

