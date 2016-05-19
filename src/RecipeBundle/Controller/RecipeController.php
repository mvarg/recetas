<?php

namespace RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    public function getAllAction()
    {
        $mngr    = $this->getDoctrine()->getManager();
        $recipes = $mngr->getRepository('RecipeBundle:Recipe')->findAll();
        $resp    = "<h1>Listado de recetas</h1>";

        foreach ($recipes as $recipe) {
            $resp .= "<div>" . $recipe->getName() . "</div>";
        }
        return new Response($resp);

//        return $this->render('RecipeBundle:Default:index.html.twig');
    }

    public function getBySlugAction($slug)
    {
        return new Response("Recuperar la receta <b>" . $slug . "</b>");
    }
}
