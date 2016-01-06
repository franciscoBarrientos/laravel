<?php

namespace Veterinaria\Http\Controllers\Auth;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Veterinaria\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Veterinaria\Http\Requests\PasswordRequest;
use Veterinaria\Http\Requests\Request;
use Veterinaria\Http\Requests\ResetPasswordRequest;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return \Veterinaria\Http\Controllers\Auth\PasswordController
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function postReset(ResetPasswordRequest $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect($this->redirectPath())->with('status', trans($response));

            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }

    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        $reset = DB::table('password_resets')
                 ->select('email', 'token')
                 ->where('token','=', $token)
                 ->first();

        return view('auth.reset',compact('reset'));
    }

    protected function resetPassword($user, $password){
        $user->password = $password;
        $user->save();
        Auth::login($user);
    }

    protected function getEmailSubject()
    {
        return property_exists($this, 'subject') ? $this->subject : 'Tu link para cambiar contraseña en Vida Animal';
    }

    public function postEmail(PasswordRequest $request)
    {
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                Session::flash('message', 'Link de recuperación enviado por correo');
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }
}
