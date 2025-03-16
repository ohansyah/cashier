<?php

namespace App\Http\Controllers;

use App\Services\OauthService;

class OauthController extends Controller
{
    public function handleOauthGoogle()
    {
        return OauthService::redirectToProvider(OauthService::GOOGLE);
    }

    public function handleOauthGoogleCallback()
    {
        return OauthService::handleProviderCallback(OauthService::GOOGLE);
    }
}
