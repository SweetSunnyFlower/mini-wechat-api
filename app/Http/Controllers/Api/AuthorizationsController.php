<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Login;
use App\User;
use EasyWeChat\Factory;
use App\Http\Controllers\Controller;
use App\Traits\PassportToken;
class AuthorizationsController extends Controller
{
    use PassportToken;
    public function login(Login $request){
        if($request->type == 'mini-wechat'){
            $mini_wechat = Factory::miniProgram(config('wechat.mini_program.default'));

            $user_info = $mini_wechat->auth->session($request->code);

            // $userInfo   = $mini->encryptor->decryptData($result['session_key'], $request->iv, $request->encryptedData);


        }

        if($request->type == 'wechat'){
            $wechat = Factory::officialAccount(config('official_account.default'));

            $user_info = $wechat->oauth->user($wechat->oauth->getAccessToken($request->code));

        }

        $user = User::query()->firstOrCreate([

        ]);

        $result = $this->getBearerTokenByUser($user, '1', false);



    }

    public function getToken(){

    }
}
