<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker=\Faker\Factory::create('fr_FR');

        for ( $i=1 ; $i<=3 ; $i++ ) {
            $category=new Category();
            $category->setTitl($faker->sentence());

            $manager->persist($category);

            for ($j =1 ; $j<10 ; $j++) {

                $article=new Article();


                $content ='<p>'.join($faker->paragraphs(5),'</p><p>').'</p>';

                $article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                    ->setCategory($category);

                $manager->persist($article);

                    for ($k=1; $k<=mt_rand(4,10); $k++) {

                        $comment=new Comment();



                        $days=(new \DateTime())->diff($article->getCreatedAt())->days;

                        $comment->setAuthor($faker->name())
                            ->setContent($faker->sentence())
                            ->setCreatedAt($faker->dateTimeBetween('-'.$days.' days'))
                            ->setArticle($article);

                        $manager->persist($comment);



                    }

            }


        }



        $manager->flush();
    }
}
