<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $g2fa = new \PragmaRX\Google2FAQRCode\Google2FA();

        $qrUrl = $g2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->g2fa_key
        );

        return view('home', ['qr' => $qrUrl]);
    }

    public function check(Request $request)
    {
        $code = $request->post('code');
        $user = Auth::user();
        $g2fa = new Google2FA();
        return $g2fa->verify($code, $user->g2fa_key) ? 'Success' : 'fail';
    }
}
