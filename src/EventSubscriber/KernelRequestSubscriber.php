<?php

declare(strict_types=1);

namespace Nistech\ContaoQualliIdClient\EventSubscriber;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\Asset\Packages;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class KernelRequestSubscriber implements EventSubscriberInterface
{
    public const PRIORITY = -100;

    public function __construct(
        private readonly Packages $packages,
        private readonly ScopeMatcher $scopeMatcher,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::REQUEST => ['loadAssets', self::PRIORITY]];
    }

    public function loadAssets(RequestEvent $e): void
    {
        $request = $e->getRequest();

        if ($this->scopeMatcher->isBackendRequest($request)) {
            if ('contao_backend_login' === $request->attributes->get('_route')) {
                // Setting the nistech_contao_qualliid_client::disable_backend_assets request attribute
                // will stop loading the backend assets.
                if (!$request->attributes->has('nistech_contao_qualliid_client::disable_backend_assets')) {
                    $GLOBALS['TL_CSS'][] = $this->packages->getUrl('css/login_button.css', 'nistech_contao_qualli_id_client');
                    $GLOBALS['TL_CSS'][] = $this->packages->getUrl('css/backend.css', 'nistech_contao_qualli_id_client');
                    $GLOBALS['TL_JAVASCRIPT'][] = $this->packages->getUrl('js/login_button_animation.js', 'nistech_contao_qualli_id_client');
                }
            }
        }
    }
}
