<?php

namespace Omnisale;

use Omnisale\Model\User\OmnisaleUser;

class OmnisaleClient extends BaseClient
{
    public function authorize($returnUrl = false)
    {
        $requestTokenUrl = $this->getRequestTokenUrl();
        $accessTokenUrl = $this->getAccessTokenUrl();

        if( isset($_GET['code']) && isset($_GET['state']) )
            return $this->apiClient->getAccessToken($accessTokenUrl, $_GET['code'], $_GET['state']);
        else
            return $this->apiClient->requestToken($requestTokenUrl, $returnUrl);
    }

    public function refreshToken($refreshToken)
    {
        $refreshTokenUrl = $this->getAccessTokenUrl();

        return $this->apiClient->refreshToken($refreshTokenUrl, $refreshToken);
    }

    public function getUser()
    {
        $userUrl = $this->getUserUrl();
        $response = $this->apiClient->get($userUrl);

        return $this->serializer->deserialize($response, OmnisaleUser::class, 'json');


//        return new OmnisaleUser(\GuzzleHttp\json_decode($response, true));
    }
}