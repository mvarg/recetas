<?php

namespace RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IngredientController extends Controller
{
    public function getAllAction()
    {
        return $this->render('RecipeBundle:Default:index.html.twig');
    }

    public function getBySlugAction($slug)
    {
        return new Response("Recuperar la receta <b>" . $slug . "</b>");
    }
}
