<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class ActivationController extends Controller
{
 
//  public function activeByEmail($code = null)
//     {
//         $page_title = "Email Verification";
//          $view = activeTemplate() . 'user.auth.authorizeWithEmail';
//         if (!$code) {
//             return 'No code provided';
//         }
        
//         $user = User::whereVerCode($code)->update([
//             'ev' => 1
//             ]);
          
//           if(($user->ev) === 1){
//               return redirect('/user/dashboard');
//           }
         
        
//     }

public function activeByEmail($code = null)
{
    // if code field is empty, the error message.
    if (!$code) {
        return 'No code provided';
    }

    // if code exists in database, instance begin, if not 404 error page.
    $user = User::whereVerCode($code)->firstOrFail();

    $page_title = "Email Verification";
    $view = activeTemplate() . 'user.auth.authorizeWithEmail';


    // if the activation been made before, we redirect user to dashboard.
    if ($user->ev == 1) {
        return redirect()->action('UserController@home');
    }

    
    // if link is valid the below code will run.
    $user->update([
        'ev' => 1
    ]);

    return redirect()->action('UserController@home');

}
}