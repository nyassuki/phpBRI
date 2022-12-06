<?php

declare(strict_types=1);

/*
 * BRIAPICollectionCopyLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BRIAPICollectionCopyLib;

use CoreInterfaces\Core\Request\RequestMethod;
use CoreInterfaces\Core\Request\TypeValidatorInterface;
use Core\Authentication\CoreAuth;
use Core\Client;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\AdditionalQueryParams;
use Core\Request\RequestBuilder;
use InvalidArgumentException;
use BRIAPICollectionCopyLib\Models\OAuthToken;
use Unirest\Request;

/**
 * Utility class for OAuth 2 authorization and token management
 */
class ImplicitAuthManager extends CoreAuth implements ImplicitAuth
{
    private $client;

    private $oAuthClientId;

    private $oAuthRedirectUri;

    private $oAuthToken;

    /**
     * Returns an instance of this class.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthRedirectUri OAuth 2 Redirection endpoint or Callback Uri
     * @param mixed $oAuthToken Object for storing information about the OAuth token
     */
    public function __construct(string $oAuthClientId, string $oAuthRedirectUri, $oAuthToken)
    {
        $this->oAuthClientId = $oAuthClientId;
        $this->oAuthRedirectUri = $oAuthRedirectUri;
        if ($oAuthToken instanceof OAuthToken) {
            $this->oAuthToken = $oAuthToken;
            parent::__construct(
                HeaderParam::init('Authorization', 'Bearer ' . $oAuthToken->getAccessToken())->required()
            );
        }
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * String value for oAuthClientId.
     */
    public function getOAuthClientId(): string
    {
        return $this->oAuthClientId;
    }

    /**
     * String value for oAuthRedirectUri.
     */
    public function getOAuthRedirectUri(): string
    {
        return $this->oAuthRedirectUri;
    }

    /**
     * OAuthToken value for oAuthToken.
     */
    public function getOAuthToken(): ?OAuthToken
    {
        return $this->oAuthToken;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthRedirectUri OAuth 2 Redirection endpoint or Callback Uri
     */
    public function equals(string $oAuthClientId, string $oAuthRedirectUri): bool
    {
        return $oAuthClientId == $this->oAuthClientId &&
            $oAuthRedirectUri == $this->oAuthRedirectUri;
    }

    /**
     * Build an authorization URL for taking the user's consent to access data.
     * @param  string|null       $state            An opaque state string
     * @param  array|null        $additionalParams Additional parameters to add the the authorization URL
     */
    public function buildAuthorizationUrl(?string $state = null, ?array $additionalParams = null): string
    {
        return (new RequestBuilder(RequestMethod::GET, '/auth'))
            ->parameters(
                AdditionalQueryParams::init($additionalParams),
                AdditionalQueryParams::init([
                    'response_type' => 'code',
                    'client_id'     => $this->oAuthClientId,
                    'redirect_uri'  => $this->oAuthRedirectUri,
                    'state'         => $state
                ])
            )
            ->build($this->client)
            ->getQueryUrl();
    }

    /**
     * Has the OAuth token expired?
     */
    public function isTokenExpired(): bool
    {
        return $this->oAuthToken->getExpiry() == null ||
            $this->oAuthToken->getExpiry() < time();
    }

    /**
     * Check if client is authorized, throws exceptions when token is null or expired.
     *
     * @throws InvalidArgumentException
     */
    public function validate(TypeValidatorInterface $validator): void
    {
        if ($this->oAuthToken == null) {
            throw new InvalidArgumentException('Client is not authorized. An OAuth token is needed to make API calls.');
        }

        if ($this->isTokenExpired()) {
            throw new InvalidArgumentException('OAuth token is expired. A valid token is needed to make API calls.');
        }
        parent::validate($validator);
    }
}
