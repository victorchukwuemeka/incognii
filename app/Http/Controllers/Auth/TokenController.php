<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class TokenController extends Controller
{
    public function createToken()
    {
      return view('auth.create-token');
    }

    public function storeToken(Request $request)
    {

      //generate the token
      $bytes = random_bytes(5);
      $token = bin2hex($bytes);

      //validate the token
      $request->validate([
        'alias' => 'required|string|max:250|unique:users',
      ]);


      //storing the anon token on the db
      $user = User::create([
        'alias' => $request->input('alias'),
        'token' => $token,
        'role'  => 'anon'
      ]);

      // Log in the user by setting the token in the session
      $request->session()->put('token', $token);
      $user_id = $user->id;
      return $this->copyToken($user_id);
    }

    public function copyToken(int $user_id)
    {
      //getting the user from its id
      $user = User::find($user_id);

      if ($user) {
        //getting the data needed from the user
        $viewData = [];
        $viewData['user_token'] = $user->token;
        $viewData['user_alias'] = $user->alias;
        return view('auth.copy-token')->with('viewData', $viewData);
      }else {
        $no_token = "No Token For You Yet";
        return view('auth.no-token')->with('no_token', $no_token);
      }
    }

    public function showGetInPage()
    {
      //moving to the  getin form
      return view('auth.get-in');
    }


    public function getin(Request $request)
    {
        //dd($request->token);
       //validate the token
       $request->validate([
         'token' => 'required|string|max:10',
       ]);

       // Attempt to authenticate the user based on the token
       $user = User::where('token', $request->token)->first();
       if ($user) {
         // Authentication successful
         Auth::login($user);
         return redirect()->intended('/'); 
       } else {
         // Authentication failed
         return back()->withInput()->withErrors(['token' => 'Invalid token']);
       }

    }

    public function getout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
