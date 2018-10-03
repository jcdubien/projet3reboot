<?php

namespace App\Controller;

use App\UI\Form\Type\CreateArticleType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;

class CreateNewController extends AbstractController

{

    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }


    /**
     * @Route("/create/new", name="create_new")
     */

    public function index(Request $request ,ObjectManager $manager)
    {

     $article = new Article;

     $form = $this->formFactory->create(CreateArticleType::class)->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) {
        $article->setCreatedAt(new \DateTime());
        $manager->persist($article);
        $manager->flush();

        return $this->redirectToRoute('blog_show', ['id'=>$article->getId()]);

     }

        return $this->render('create_new/index.html.twig', [
            'formArticle'=>$form->CreateView()

        ]);
    }
}
