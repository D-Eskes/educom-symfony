<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


use App\Entity\Optreden;


#[Route('/test')]
class TestController extends AbstractController
{
    #[Route('/', name: 'test')]
    public function index(): Response
    {      

        // $test = new Test();
        // $test->setTitle("Test #1");
        // $test->setContent("Test in progress");


        $repository = $this->getDoctrine()->getRepository(Optreden::class);
        $test = $repository->getAllOptredens();

        // $normalizers = [
        //     new ObjectNormalizer()
        // ];

        // $encoders = [
        //     new JsonEncoder()
        // ];

        // $serializer = new Serializer($normalizers, $encoders);
        // $serializedData = $serializer->serialize($test, "json", [
        //     ObjectNormalizer::SKIP_NULL_VALUES => true,
        // ]);

        // dd($serializedData);
        // die();

        $response  = $this->json($test, Response::HTTP_OK, [], [
            ObjectNormalizer::IGNORED_ATTRIBUTES => ["id", "__initializer__", "__cloner__", "__isInitialized__"],
            ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return ("OptredenID:" . $object->getId());
            }
        ]);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);
        return $response;
    }
}
