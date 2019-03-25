<?php

namespace App\Controller;

use App\Form\ClientFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        $form = $this->createForm(ClientFormType::class);

        return $this->render('client_admin/new.html.twig', [
            'clientForm' => $form->createView()
        ]);
    }
}
