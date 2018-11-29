<?php
namespace AppBundle\Form;


use AppBundle\Entity\Newspaper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class JournalType
 * @package AppBundle\Form
 */
class NewspaperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('submit', SubmitType::class, array(
                'label' => 'Envoyer',
                'attr'  => array('class' => 'btn btn-default pull-right'),
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Newspaper::class,
        ));
    }
}