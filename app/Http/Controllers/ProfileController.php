<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\passwordValidationRules;

class ProfileController extends Controller
{
    use PasswordValidationRules;
    public function update(Request $input)
    {
        // //dd($input->all());
        $user = User::find(Auth::user()->id);
        // //dd(Hash::check($input['current_password'], $user->password));
        // Validator::make($input->all(), [
        //     'current_password' => ['required', 'string'],
        //     'password' => $this->passwordRules(),
        // ])->after(function ($validator) use ($user, $input) {
        //     if (!isset($input['current_password']) || !Hash::check($input['current_password'], $user->password)) {
        //         //dd(1);
        //         return "Ancien mot de passe erroné";
        //     }
        // })->validateWithBag('updatePassword');

        $validator = Validator::make($input->all(), [
            'current_password' => 'required|between:5,20|alpha',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // dd(1);
            return back()->withErrors($validator)->withInput();
        }

        $user->password = Hash::make($input['password']);
        dd($user->save());
        return 1;
    }
}
