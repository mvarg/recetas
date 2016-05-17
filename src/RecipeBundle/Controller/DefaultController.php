<?php

namespace RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RecipeBundle:Default:index.html.twig');
    }

    public function showAction($slug)
    {
        return new Response("Recuperar la receta <b>" . $slug . "</b>");
    }
}
