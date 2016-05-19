<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function loginAction()
    {
        return new Response("Login");
    }

    public function registerAction()
    {
        return new Response("Register");
    }

    public function contactAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }
}
