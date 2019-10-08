<?php

namespace App\Controller;

use App\Form\ReproducerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ReproducerController extends AbstractController
{
    public function index(Request $request)
    {
        $data = [
            'extra' => 'data',

            // The problem occurs regardless of whether this data is here, or not.
//            'collection' => [
//                'zibble',
//                'zobble',
//            ]
        ];

        $form = $this->createForm(ReproducerType::class, $data);

        if ($request->isMethod(Request::METHOD_POST)) {
            $form->handleRequest($request);
            return $this->render('submitted.html.twig');
        } else {
            return $this->render('reproducer.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
}