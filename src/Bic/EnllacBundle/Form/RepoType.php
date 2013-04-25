<?php

namespace Bic\EnllacBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RepoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('descrip')
            ->add('links')
            ->add('tags')
            ->add('users')
            ->add('users_fl')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bic\EnllacBundle\Entity\Repo'
        ));
    }

    public function getName()
    {
        return 'bic_enllacbundle_repotype';
    }
}
