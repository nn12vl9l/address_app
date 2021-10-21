<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\IdentityProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function oauthCallback($provider)
    {
        // dd('test');
        try {
            $socialUser = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            // dd($e);
            return redirect('/login')->withErrors(['oauth' => '予期せぬエラーが発生しました']);
        }
        // dd($socialUser);
        $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

        // ユーザーが認証済みか確認
        if ($user->exists) {
            if ($user->identityProvider->name != $provider) {
                return redirect('/login')->withErrors(['oauth' => 'このメールアドレスはすでに別の認証で使われてます']);
            }
        } else {
            $user->name = $socialUser->getNickname() ?? $socialUser->name;
            $identityProvider = new IdentityProvider([
                'id' => $socialUser->getId(),
                'name' => $provider
            ]);

            DB::beginTransaction();
            try {
                $user->save();
                $user->identityProvider()->save($identityProvider);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // dd($e);
                return redirect()
                    ->route('login')
                    ->withErrors(['transaction_error' => '保存に失敗しました']);
            }
        }

        // ログイン
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

