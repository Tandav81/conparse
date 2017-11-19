<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 19/11/17
 * Time: 00:48
 */

namespace AppBundle\Form;

use AppBundle\Entity\Contract;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'imageFile',
            FileType::class,
            array(
                'required' => true,
            )
        )->add(
            'save',
            SubmitType::class,
            array(
                'label' => 'Scanner un document'
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contract::class,
        ));
    }
}
