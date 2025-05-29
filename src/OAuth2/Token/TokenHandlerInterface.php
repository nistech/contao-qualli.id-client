<?php

declare(strict_types=1);


namespace Nistech\ContaoQualliIdClient\OAuth2\Token;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

#[AutoconfigureTag('contao_qualliid_client.token_handler')]
interface TokenHandlerInterface
{
    /**
     * @return array<string>
     */
    public function supports(): array;

    public function getUserBadgeFromResourceOwner(ResourceOwnerInterface $resourceOwner, string $firewall): UserBadge|null;
}
