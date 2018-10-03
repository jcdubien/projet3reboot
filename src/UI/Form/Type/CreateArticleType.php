<?php
/**
 * Created by PhpStorm.
 * User: jcdub
 * Date: 11/09/2018
 * Time: 12:33
 */

namespace App\UI\Form\Type;


use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class)
            ->add('category', EntityType::class ,[
                        'class'=>Category::class,
                        'choice_label'=>'titl'

                ])
            ->add('content', TextareaType::class)
            ->add('image',TextType::class)
        ;
     }

}