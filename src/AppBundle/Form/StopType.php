<?php
/**
 * Created by PhpStorm.
 * User: briedis
 * Date: 12/18/16
 * Time: 5:10 PM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Route;
use AppBundle\Entity\RouteStop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StopType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('routes', EntityType::class, [
                'class' => RouteStop::class,
                'multiple' => true,
                'choice_value' => function($choice){
                    return $choice->getId();
                }
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
    }
    public function getName()
    {
        return 'app_bundle_stop_type';
    }

}