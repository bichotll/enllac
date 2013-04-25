<?php

namespace Bic\EnllacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enllac')
            ->add('title')
            ->add('descrip')
            ->add('iconUrl')
            ->add('repos')
            ->add('tags')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bic\EnllacBundle\Entity\Link'
        ));
    }

    public function getName()
    {
        return 'bic_enllacbundle_linktype';
    }
}
