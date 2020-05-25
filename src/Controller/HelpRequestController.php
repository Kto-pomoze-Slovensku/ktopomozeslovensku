<?php
declare(strict_types=1);

/*
 * @author tmihalicka
 * @copyright PIXEL FEDERATION
 * @license Internal use only
 */

namespace App\Controller;

use App\Entity\HelpRequest;
use App\Form\HelpRequestType;
use App\Form\Model\HelpRequestForm;
use App\Service\HelpRequestService;
use DateTimeImmutable;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
final class HelpRequestController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return Response
     * @throws Exception
     */
    public function index(Request $request): Response
    {
        return $this->render('help-application.html.twig');
    }

    /**
     * @return Response
     */
    public function success(): Response
    {
        return $this->render('help-request-success.twig');
    }
}
