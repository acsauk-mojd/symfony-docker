<?php

namespace App\Controller;

use App\Form\ClientFormType;
use App\Form\ClientFormTypeEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @var bool
     */
    private $emailEnabled;

    public function __construct(string $emailEnabled)
    {
        $this->emailEnabled = $emailEnabled;
    }

    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        $form = $this->emailEnabled == 1 ?
            $this->createForm(ClientFormTypeEmail::class) : $this->createForm(ClientFormType::class);

        return $this->render('client_admin/new.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }
}
