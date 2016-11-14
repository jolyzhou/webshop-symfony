<?php

namespace Foggyline\SalesBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class SalesOrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_PROCESSING => \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_PROCESSING,
                    \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_CANCELED => \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_CANCELED,
                    \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_COMPLETE => \Foggyline\SalesBundle\Entity\SalesOrder::STATUS_COMPLETE,
                ),
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Foggyline\SalesBundle\Entity\SalesOrder'
        ));
    }
}
