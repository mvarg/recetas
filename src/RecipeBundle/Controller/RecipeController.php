<?php

namespace RecipeBundle\Controller;

use RecipeBundle\Entity\Recipe;
use RecipeBundle\Form\RecipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    public function getAllAction()
    {
        $recipes = $this->getDoctrine()
                        ->getRepository('RecipeBundle:Recipe')
                        ->findAll();

        return $this->render('RecipeBundle:Default:list.html.twig', ['recipes' => $recipes]);
    }

    public function getByIdAction($id)
    {
        $recipe = $this->getDoctrine()->getRepository("RecipeBundle:Recipe")->findOneById($id);

        return new Response($recipe->getName());
    }

    public function getBySlugAction($slug)
    {
        $recipe = $this->getDoctrine()->getRepository("RecipeBundle:Recipe")->findOneBySlug($slug);

        return new Response($recipe->getName());
    }

    public function addAction()
    {
        $recipe     = new Recipe();
        $recipeForm = new RecipeType();
        $form       = $this->createForm($recipeForm, $recipe, [
                          'action' => $this->generateUrl('recipe_add'),
                          'method' => 'POST'
                      ]);

        return $this->render('RecipeBundle:Default:add.html.twig', ['form' => $form->createView()]);
    }
}
