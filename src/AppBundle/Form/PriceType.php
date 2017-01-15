<?php
/**
 * Created by PhpStorm.
 * User: briedis
 * Date: 12/18/16
 * Time: 5:10 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stopPrice', MoneyType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
    }
    public function getName()
    {
        return 'app_bundle_price_type';
    }

}