<?php
declare(strict_types=1);
/*
 * @author pbrecska <pbrecska@pixelfederation.com>
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Controller;

use App\Entity\DonationRequest;
use App\Entity\HelpRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Handles serialization of database to csv and posting it to output
 */
final class ExportController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function dopyt(Request $request): Response
    {
        $data = $this->entityManager->getRepository(HelpRequest::class)->findAll();

        $encoders = [new CsvEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $content = $serializer->serialize($data, 'csv', [
            AbstractNormalizer::ATTRIBUTES => [
                'id',
                'telephone',
                'institutionName',
                'contactPerson',
                'telephone',
                'email',
                'address',
                'requestedItems' => ['item' => ['name'], 'quantity', 'other'],
                'requestedText',
                'resolved',
            ]
        ]);

        return new Response("\xEF\xBB\xBF".$content, 200, array(
            'Content-Type' => 'application/force-download',
            'Content-Disposition' => 'attachment; filename="' . sprintf('export-dopyt-%s.csv', date('md_His')) . '"',
            'Cache-Control' =>  'no-cache',
        ));
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function ponuka(Request $request): Response
    {
        $data = $this->entityManager->getRepository(DonationRequest::class)->findAll();

        $encoders = [new CsvEncoder()];
        $defaultContext = [
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['createdAt', 'requests']
        ];
        $normalizers = [new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)];

        $serializer = new Serializer($normalizers, $encoders);
        $content = $serializer->serialize($data, 'csv', [
            AbstractNormalizer::ATTRIBUTES => [
                'id',
                'contactPerson',
                'email',
                'telephone',
                'address',
                'donatedItems' => ['item' => ['name'], 'quantity', 'other'],
                'resolved'
            ]
        ]);

        return new Response("\xEF\xBB\xBF".$content, 200, array(
            'Content-Type' => 'application/force-download',
            'Content-Disposition' => 'attachment; filename="' . sprintf('export-ponuka-%s.csv', date('md_His')) . '"',
            'Cache-Control' =>  'no-cache'
        ));
    }
}
