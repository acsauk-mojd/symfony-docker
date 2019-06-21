<?php

namespace App\Controller;

use App\Form\ClientFormType;
use App\Form\ClientFormTypeEmail;
use App\Form\ClientFormTypeFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @var bool
     */
    private $emailEnabled;
    /**
     * @var ClientFormTypeFactory
     */
    private $factory;

    public function __construct(string $emailEnabled, ClientFormTypeFactory $factory)
    {
        $this->emailEnabled = $emailEnabled;
        $this->factory = $factory;
    }

    /**
     * @Route("/multiple-models", name="multipleModels")
     */
    public function multipleModels()
    {
        $form = $this->emailEnabled == 1 ?
            $this->createForm(ClientFormTypeEmail::class) : $this->createForm(ClientFormType::class);

        return $this->render('client_admin/new-class.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/flag-aware-factory", name="flagAware")
     */
    public function flagAwareFactory()
    {
        $formType = $this->factory->createClientForm();
        $form = $this->createForm(get_class($formType));

        return $this->render('client_admin/flag-aware-factory.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }
}
