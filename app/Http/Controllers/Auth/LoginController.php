<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider(Request $request)
    {
        $provider = $request->provider;
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $provider = $request->provider;
        $social_user = Socialite::driver($provider)->stateless()->user();
        $social_name = $social_user->getName();
        $social_email = $social_user->getEmail();
        $social_uid = $social_user->getId();

        // uid と provider名で、ユーザーが登録されているか確認
        $user = User::where([['uid', $social_uid], ['provider', $provider]])->first();

        if (!$user) {
            // snsのemailがあればそのemail、なければ ダミーのemailを作成
            $social_email = $social_email ? $social_email : "$social_uid-$provider- @example.com";

            $user = new User([
                'uid' => $social_uid,
                'provider' => $provider,
                'email' => $social_email,
                'name' => $social_name,
                'password' => Hash::make(Str::random()),
            ]);
            // ソーシャル認証の場合は、メールアドレスの認証を行わない
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
        }

        if ($user) {
            auth()->login($user);
            return redirect('/dashboard');
        } else {
            return '必要な情報が取得できていません。';
        }
    }
}
