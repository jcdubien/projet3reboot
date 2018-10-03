<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ValidateController extends AbstractController
{



    /**
     * @Route("/validate/{$id}", name="validate")
     */
    public function index($id)
    {

        $repo=$this->getDoctrine()->getRepository(Comment::class);

        $comment=$repo->find($id);

        $comment->focused(false);

        return $this->redirectToRoute('backend');
    }
}
