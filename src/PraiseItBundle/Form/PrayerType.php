<?php

namespace PraiseItBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('required' => true, 'attr' => array('placeholder' => 'What is your name?')))
            ->add('sacrifice', 'textarea', array('required' => true, 'attr' => array('placeholder' => 'Place your offering upon the Altar')))
            ->add('date', 'datetime', array('required' => true))
            ->getForm()
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PraiseItBundle\Entity\Prayer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'praiseitbundle_altar_prayer';
    }
}
