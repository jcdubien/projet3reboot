<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModerateController extends AbstractController
{
    /**
     * @Route("/moderate", name="moderate")
     */
    public function index()
    {
        return $this->render('moderate/index.html.twig', [
            'controller_name' => 'ModerateController',
        ]);
    }
}
