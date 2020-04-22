<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function showInvitecode($code='')
    {
        
        if($code == "02y05V18O")
        {
          return view('auth.register');
          
        }
        else
        {
               return view('invite_code'); 

   
        }
        
    }
     
    public function showRegistrationForm($code='')
    {
        
        if($code == "02y05V18O")
        {
          return view('auth.register');
          
        }
        else
        {

               return view('signup_application_1');
   
        }
        
        
      
        
    }
    
    
    public function signup_application()
    {
        
        return view('signup_application_1'); // change ko muna saglit wala muna invitation code redirect muna sa signup form // 12/20/2019
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function facebook_register(Request $request)
    {
        //$this->validator($request->all())->validate();

        event(new Registered($user = $this->update_fb_user($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    
    
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    
    

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
