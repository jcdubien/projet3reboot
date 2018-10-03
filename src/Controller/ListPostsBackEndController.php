<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListPostsBackEndController extends AbstractController
{
    /**
     * @Route("/list/posts/back/end", name="list_posts_back_end")
     */
    public function index()
    {
        $repo=$this->getDoctrine()->getRepository(Article::class);
        $articles=$repo->findAll();

        return $this->render('list_posts_back_end/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
