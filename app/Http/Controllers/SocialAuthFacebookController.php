<?php
// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;

use App\Model\social_facebook_patterns;
use App\Model\frontend\User;



class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return voidcallback
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
  
    }
    
    
    
    public function signup_application_form(SocialFacebookAccountService $service, $providerUserid="")
    {
         $data  =  $service->getUserDetails($providerUserid);
  
        return view('auth.facebook_register',array('data'=>$data,'providerUserid'=>$providerUserid));
    }
    
     public function accepted_fb_sign_in(Request $requests)
    {       
        
             social_facebook_patterns::where('provider_user_id',$requests->fb_id)->update([
                    'accept' => 'Y',
                ]);
        
                 return Socialite::driver('facebook')->redirect();
      
    }
    
    
    
    public function facebook_signup($providerUserid="")
    {
        return view('facebook_signup_application',array('providerUserid'=>$providerUserid));
    }
    
    
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    //public function callback(SocialFacebookAccountService $service)
     public function callback(\App\Services\SocialFacebookAccountService $service)
	{
	   
	   $providerUser = Socialite::driver('facebook')->user(); 
	   
	    $data  =  $service->checkIfhavenotyetRegister($providerUser);
    
        if($data['status'] == "created" )
        {
            return redirect()->to('facebook/signup/'.$data['provider_user_id']);
            exit;
        }
        else if( $data['status'] == "exist" &&  empty($data['user_accept']) )
        {
            return redirect()->to('facebook/signup/'.$data['provider_user_id']);
            exit;
        }
        else if( $data['status'] == "exist" &&  !empty($data['user_accept']) &&  $data['user_accept'] == "Y")
        {
	        $user = $service->createOrGetUser($providerUser);
	        return redirect()->to('signup/application/form/'.$data['provider_user_id']);
	        exit;
        } 
        else if( $data['status'] == "exist" &&  !empty($data['user_accept']) &&  $data['user_accept'] == "D")
        {
            $user = $service->createOrGetUser($providerUser);
        
        }
        
    
        auth()->login($user);
        return redirect()->to('/dashboard');
       
    }
}
