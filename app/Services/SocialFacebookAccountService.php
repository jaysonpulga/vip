<?php

namespace App\Services;

use App\Model\SocialFacebookAccount;

use App\Model\frontend\User;


use Laravel\Socialite\Contracts\User as ProviderUser;

use App\Model\social_facebook_patterns;

class SocialFacebookAccountService
{
    
    public function getUserDetails($providerUserid)
    {
        
         $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUserid)
            ->first();
            
               if(!empty($account))
                {
                    $account = $account->user;
                }
                else
                {
                     $account = array();
                }
            
            return $account;
    }


    
    public function checkIfhavenotyetRegister(ProviderUser $providerUser)
    {
      
       $id =  $providerUser->getId();
      
       if(social_facebook_patterns::where('provider_user_id',$id)->exists())
		{
		
		  $user = social_facebook_patterns::where('provider_user_id',$id)->first(); 
		  
		  $status = array(
						'user_accept' => $user->accept,
						'status' =>  "exist",
						'provider_user_id' => $id
					);
                
            return $status;    
		    
		}
		else
		{
		      $user = social_facebook_patterns::create([
                     'provider_user_id' => $providerUser->getId(),
                      'provider' => 'facebook'
                ]);  
                
                 $status = array(
						'user_accept' => '',
						'status' =>  "created",
						'provider_user_id' => $providerUser->getId()
					);
                
            return $status;    
		    
		}  
      
    }
    
    
    public function createOrGetUser(ProviderUser $providerUser)
    {
        
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            
            return $account->user;
            

        } else {
            
            

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => ($providerUser->getEmail() != "") ?  $providerUser->getEmail() : "",
                    'name' => $providerUser->getFirst_name(),
                    'lastname' => $providerUser->getLast_name()
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
        
        
    }
    
    
    
}