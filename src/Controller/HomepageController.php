<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Optreden;


#[Route("/homepage")]
class HomepageController extends BaseController {

    #[Route("/", name: "homepage")]
    public function index() {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $repository = $this->getDoctrine()->getRepository(Optreden::class);
        $data = $repository->getAllOptredens();

        dd($data);
        die();
        // return ['controller_name' => 'HomepageController'];
    }

    #[Route("/backhome", name: "backhome")]
    public function backhome() {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route({
     *     "en": "/contact-us",
     *     "nl": "/neem-contact-op"
     * }, name="contact")
     */
    public function contact(Request $request) {
        $locale = $request->getLocale();
        $msg = "This page is in English";
        if ($locale == "nl") {
            $msg = "Deze pagina is in het Nederlands";
        }
        return new Response(
            "<html><body>$msg</body></html>"
        ); 
    }

    /**
     * @Route("/data.{_format}", name="api_output", requirements={"_format": "xml|json"})
    */
    public function api($_format) {
        $data = [
            ["id" => 1, "naam" => "Piet"],
            ["id" => 2, "naam" => "Wilma"],
            ["id" => 3, "naam" => "Harrie"]
        ];
        if ($_format == "json") {
            return($this->json($data));
        } else {
        
            /// Om een array naar XML om te zetten is een parser nodig.
            /// Hier even een very quick en very dirty oplossing
            /// - die je eventueel ook met Twig zou kunnen maken.
            $d = "<data>";
            foreach($data as $record) {
                $id = $record["id"];
                $naam = $record["naam"];
                $d .= "<record id='$id'> $naam </record>";
            }   
            $d .= "</data>";
            return (new Response($d));
        }
    }

    /**
     * @Route("/save-data", name="homepage_save_data")
     */
    public function saveData(Request $request) {
        $params = $request->request->all();
        dd($params);
    }


     /**
     * @Route("/data_format.{_format}", name="data_format", requirements={"_format": "xml|json"})
    */
    public function show($_format)
    {
        $repository = $this->getDoctrine()->getRepository(Optreden::class);
        $optredens = $repository->getAllOptredens();

        return $this->render('homepage/format.'.$_format.'.twig', [
            'optredens' => $optredens,
        ]);
    }

}
