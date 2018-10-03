<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FocusCommentController extends AbstractController
{
    /**
     * @Route("/focus/comment/{$id}", name="focuscomment")
     */
    public function index()
    {
        return $this->render('focus_comment/index.html.twig', [
            'controller_name' => 'FocusCommentController',
        ]);
    }
}
