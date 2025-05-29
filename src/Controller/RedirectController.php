<?php

declare(strict_types=1);

namespace Nistech\ContaoQualliIdClient\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/_qualliid_login/{_qualliid_client}/backend', name: self::LOGIN_ROUTE_BACKEND, defaults: ['_scope' => 'backend'])]
#[Route('/_qualliid_login/{_qualliid_client}/frontend', name: self::LOGIN_ROUTE_FRONTEND, defaults: ['_scope' => 'frontend'])]
class RedirectController extends AbstractController
{
    public const LOGIN_ROUTE_BACKEND = 'nistech_contao_qualliid_client_redirect_backend';
    public const LOGIN_ROUTE_FRONTEND = 'nistech_contao_qualliid_client_redirect_frontend';

    public function __invoke(Request $request, string $_qualliid_client): Response
    {
        // This point should never be reached.
        return new Response('');
    }
}
