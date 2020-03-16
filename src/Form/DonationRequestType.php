<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Form;

use App\Entity\Item;
use App\Entity\DonationRequest;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 *
 */
final class DonationRequestType extends AbstractType
{
    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Item::class);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contactPerson', TextType::class, [
            'required' => true,
            'label' => 'Meno konktaktnej osoby',
            'attr' => [
                'placeholder' => 'Meno a priezvisko'
            ],
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('address', TextType::class, [
            'required' => true,
            'label' => 'Adresa konktaktnej osoby',
            'attr' => [
                'placeholder' => 'Adresa'
            ],
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('telephone', TelType::class, [
            'required' => true,
            'label' => 'Telefónne číslo',
            'attr' => [
                'placeholder' => '+421'
            ],
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('email', EmailType::class, [
            'required' => true,
            'label' => 'E-mail adresa',
            'attr' => [
                'placeholder' => '@'
            ],
            'constraints' => [
                new Email()
            ]
        ]);

//        $builder->add('donationItem', EntityType::class, [
//            'required' => true,
//            'label' => 'Typ pomôcok, ktoré viem ponúknuť',
//            'class' => Item::class,
//            'choice_label' => 'name'
//        ]);
//
//        $builder->add('quantity', IntegerType::class, [
//            'required' => true,
//            'label' => 'Množstvo',
//            'constraints' => [
//                new NotBlank()
//            ]
//        ]);

        $builder->add('policy', CheckboxType::class, [
            'required' => true,
            'value' => 1,
            'label' => 'Súhlasím so spracovaním osobných údajov',
            'constraints' => [
                new EqualTo(1)
            ]
        ]);

        $builder->add('submit', SubmitType::class, [
                'label' => 'ODOSLAť DAR', 'attr' => ['class' => 'btn-default']
            ]
        );
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => DonationRequest::class]);
    }
}
