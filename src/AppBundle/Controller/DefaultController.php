<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contract;
use AppBundle\Form\ContractType;
use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $contract = new Contract();

        $form = $this->createForm(ContractType::class, $contract);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $contract->getImageFile();

            $fileName = md5(uniqid()).'.'. $file->guessExtension();

            $file->move(
                $this->getParameter('contracts_directory'),
                $fileName
            );

            $contract->setImageFile($fileName);
            $contract->setImageName($file->getClientOriginalName());
            $contract->setImageSize($file->getClientSize());

            $em = $this->getDoctrine()->getManager();
            $em->persist($contract);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'form' => $form->createView()
        ]);
    }
}
