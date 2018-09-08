<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{


    /**
     * @Route("/blog/{id}",name="blog_show")
     */

    public function show($id) {

        $repo=$this->getDoctrine()->getRepository(Article::class);

        $article=$repo->find($id);


        return $this->render('post/index.html.twig',[
            'article' => $article

        ]);
    }
}
