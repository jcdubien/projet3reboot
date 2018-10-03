<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DelecommentController extends AbstractController
{
    /**
     * @Route("/delecomment/{$id}", name="deletecomment")
     */
    public function index($id, ObjectManager $manager)
    {
        $repo=$this->getDoctrine()->getRepository(Comment::class);

        $comment=$repo->find($id);

        $manager->remove($comment);
        $manager->flush();

        return $this->redirectToRoute('backend');
    }
}
