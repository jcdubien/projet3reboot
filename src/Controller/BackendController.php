<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BackendController extends AbstractController
{
    /**
     * @Route("/backend", name="backend")
     */
    public function index()
    {

        $repo=$this->getDoctrine()->getRepository(Comment::class);

        $comments=$repo->findByFocused(true);

        return $this->render('backend/index.html.twig', [

            'comments' => $comments
        ]);
    }
}
