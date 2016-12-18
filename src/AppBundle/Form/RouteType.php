<?php
/**
 * Created by PhpStorm.
 * User: briedis
 * Date: 12/18/16
 * Time: 5:10 PM
 */

namespace AppBundle\Form;


use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RouteType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('route', TextType::class)
            ->add('time', TimeType::class)
            ->add('end_time', TimeType::class)
            ->add('price', DecimalType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
    }
    public function getName()
    {
        return 'app_bundle_route_type';
    }

}