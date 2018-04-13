<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 28.04.2017
 * Time: 14:45
 */

namespace ShoploMulti;

interface ShoploMultiAdapterInterface
{
    public function get($url, $parameters = [], $headers = []);

    public function post($url, $data = [], $headers = []);

    public function put($url, $data = [], $headers = []);

    public function delete($url);

    public function setAccessToken($accessToken);

    public function setSSOAppId($ssoAppId);
}