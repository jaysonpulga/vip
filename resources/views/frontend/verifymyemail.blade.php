@extends('frontend.layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('public/app.css')}}"> 

<!-- ManyChat -->
<script src="//widget.manychat.com/101989987842833.js" async="async"></script>



<style>

.content-wrapper, .right-side {
    min-height: 100%;
    background-color: #f8fafc !important;
    z-index: 800;
}
</style>


<style>
 .title
{
	font-weight:bold;
	font-size:25px;
}

.hidden
{
	display:none;
}
.show
{
	display:block;
}

.jumbotron {
     padding-top: 0px;
    padding-bottom: 0px;
    margin-bottom: 30px;
    color: inherit;
    background-color: #eee;
}

.jumbotronText 
{
    color: #73879C;
    font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.471;
}

.jumbotronText p
{
     color: #000;
}

.jumbotron h1 {
    font-size: 50px !important;
}
</style>

<br>


<section class="first_content">          

         <div class='row'>
            <div class="companyinfo_sub text-center font-hind-siliguri">
                <h1 class="mtl">
                   Welcome to {{ env('APP_NAME') }}!
                </h1>
                <p class="font-20">
                    We only need some extra information to give you access to {{ env('APP_NAME') }}.
                </p>
            </div>
        </div>
        
    <ol class="ol-circle">    
      <div class='row'>
        <div class="col-md-12 col-sm-12 col-xs-12">
           
            <div class="bb-dimmed pbxl">

                <div class="row">
                    <div class="col-md-12">
                         <h2>Hello, {{Auth::user()->name}}!</h2>
                       
                        <br>
                        <li class="mbm">
                            <p class="mbxl" style='font-size:15px'>
                                 Before proceeding, please check your email for a verification code and verify your email, Add our email address to your whitelist,
                                 <br> If you did not receive the email.  click  <a href='javascript:void(0);' id='requestnew_emailverification'><b>request another code</b>  </a> or  <a href='javascript:void(0);' id='changemyemail'> <b>change my primary email</b> </a>
                            </p>
                        </li>
                        @if(empty(@$whitelist[0])) 
                        <div class="form-group">

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="email_whitelist" value="1">
                                    I've added <u> {{ env('MAIL_USERNAME') }} </u> to my email address whitelist.
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <small>
                            It's very important that you do receive all of our emails. Sometimes your email
                            provider might mistakenly catch good emails and send them to your SPAM folder. That will
                            lead to missing out on invitations. The solution is to add our email address to your
                            email provider whitelist.
                        </small>
                    </div>
                </div>
                 @endif
                <div class="form-group">
                    <a data-toggle="modal" class="cursor-pointer pull-right" data-target="#modal-help-whitelist-email">
                        How do I do this?
                    </a>
                </div>

            </div>
           

        </div>
        </div>
       
      
        
        <div class='row'>
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(empty(@$messenger[0]))
            <div class="bb-dimmed pbxl mbxl">
                <br>
                <div class="form-group">
                     <li class="mbm">
                        <h4 class="mbxl">
                           Accept {{ env('APP_NAME') }} on Facebook Messenger 
                        </h4>
                    </li>
                </div>
                
                <div class="row">
                    
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    
                        <p id="mc-dfa15dbd-b463-b149-92b7-ef70750b5d03" class="fb-send-to-messenger mc-send-to-messenger fb_iframe_widget" messenger_app_id="532160876956612" page_id="101989987842833" data-ref="optin_7343061_c28fac1d-8fec-9fca-b3e7-4e0e744b53aa_3d914d63-738c-1ab4-26e2-23f0b572873a" color="blue" size="large" cta_text="SEND_TO_MESSENGER" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=532160876956612&amp;color=blue&amp;container_width=155&amp;cta_text=SEND_TO_MESSENGER&amp;locale=en_US&amp;messenger_app_id=532160876956612&amp;page_id=101989987842833&amp;ref=optin_7343061_c28fac1d-8fec-9fca-b3e7-4e0e744b53aa_3d914d63-738c-1ab4-26e2-23f0b572873a&amp;sdk=joey&amp;size=large"><span style="vertical-align: bottom; width: 256px; height: 52px;"><iframe name="f10fdca51e49ae8" width="1000px" height="1000px" title="fb:send_to_messenger Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.1/plugins/send_to_messenger.php?app_id=532160876956612&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df2f4f52ca9ab65%26domain%3Dreviewers.club%26origin%3Dhttps%253A%252F%252Freviewers.club%252Ff31fdb446222c68%26relation%3Dparent.parent&amp;color=blue&amp;container_width=155&amp;cta_text=SEND_TO_MESSENGER&amp;locale=en_US&amp;messenger_app_id=532160876956612&amp;page_id=101989987842833&amp;ref=optin_7343061_c28fac1d-8fec-9fca-b3e7-4e0e744b53aa_3d914d63-738c-1ab4-26e2-23f0b572873a&amp;sdk=joey&amp;size=large" style="border: none; visibility: visible; width: 256px; height: 52px;" class=""></iframe></span></p>
                        
                     
                     
                
                    </div>
                    
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                        <a data-toggle="modal" class="cursor-pointer" data-target="#modal-help-messenger">
                            I don't have Facebook Messenger
                        </a>
                    </div>
                </div>
                
                
                <div class="mtl">
                    <small>
                        To be part of the platform its required to accept us on Facebook. Simply click on the
                        Send to Messenger button and the system will detect if the sign up is successful!
                    </small>
                    <br>
                    <br>
                    
                    
                    <div>
                       <label>Paste your verification code to receive personal message through messenger </label> 
                        <input class="form-control" style="width:50%" id="paypal" name="messenger" type="text" placeholder="Verification Code">
                    </div>
                    
                </div>
            </div>
            @endif
            
            
          
            
            
        </div>
        </div>
        
        
        
        <div class='row'>
        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(empty(@$paypal[0]))
            <div class="bb-dimmed pbxl mbxl">
                
             <li class="mbm">    
                <h4 class="mbxl">
                    How do you want to receive your cashback? 
                </h4>
            </li>
        
                <div class="row">
                    <div class="col-md-2">
                        <a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" class="loading" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;">
                            <img class="mbm" src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_74x46.jpg" alt="PayPal Logo">
                        </a>
                    </div>
                    <div class="col-md-10">
                        1. Your PayPal address
                        <div class="mbm mts">
                            <small>
                                We need your paypal email address to send you cashback or payout of the points you have
                                earned.
                            </small>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="paypal" name="paypal" type="text" placeholder="Your PayPal Address">
                        </div>
                        <a target="_blank" href="https://www.paypal.com/webapps/mpp/account-selection" class="loading">
                            I dont have PayPal - Sign up here.
                        </a>
                    </div>
                    <div class="col-md-12">
                        <div class="mtl">
                            <small>
                                FAQ:
                                    <br>
                                    <span>
                                       * How to get funds from Paypal to your bank account? - Its very simple. Check
                                        here:
                                        <a data-toggle="modal" data-target="#modal-help-paypal">
                                            how to transfer money from Paypal to bank account.
                                        </a>
                                   </span>
                                   <br>
                                   <span>
                                      * Why do we need Paypal? Because it is the cheapest way to get money back to you.
                                        The system takes care of all your transaction fees. Money earned is actual money
                                        paid.
                                    </span>
                                
                            </small>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
        </div>
        

        
        @if(empty(@$paypal[0]) || empty(@$messenger[0]) || empty(@$whitelist[0]))
        <div class='row'>
            <div class="col-md-12 col-sm-6 col-xs-6">
                <div class="pull-right"> 
                    <button class="btn btn-primary btn-lg submit_verification">Submit</button>
                </div>
                
            </div>    
        </div>
        @endif
        
         </ol>    
        
        <script>
            $(document).on('click','.submit_verification',function(){
                var messenger = $('input[name="messenger"]').val();
                var paypal = $('input[name="paypal"]').val();
                var whitelist = $('input[name="email_whitelist"]:checked').val();
                
                    $.ajax({
                        url:"{{asset('verify_account')}}",
                        post:"POST",
                        headers:{"X-CSRF-TOKEN":$('meta[name="_token"]').attr('content')},
                        data:{messenger:messenger,paypal:paypal,whitelist:whitelist},
                        beforeSend: function() {
                			loading = $("body").waitMe({
                				effect: 'timer',
                				text: 'Verifying .........',
                				bg: 'rgba(255,255,255,0.90)',
                				color: '#555'
                			}); 
                					
                		},
                        success:function(data){
                            loading.waitMe('hide');
                            var json = JSON.parse(data);
                            if(json.success == true){
                                swal({
                                    type:'success',
                                    title:'',
                                    text:json.message
                                }).then(function(){
                                    location.reload();
                                })
                            }else{
                                swal({
                                    type:'error',
                                    title:'',
                                    text:json.message
                                }).then(function(){
                                    location.reload();
                                })
                            }
                        }
                    })
            })
        </script>
        

        
</section>         


<div id="chagemyemail_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Change my primary email address</h4>
		  </div>
		<form id="email_data">  
		{{ csrf_field() }}
		  <div class="modal-body">
			
			<div class="box-body">
		
                <div class="form-group" >
                  <label for="journal_id" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email"  required class="form-control" id="email" name="email" required >
                  </div>
                </div>
				<div style="display:block;margin-bottom:15px;clear:both"></div>
				
         
            </div>
		  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default  btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-success btn-primary  btn-flat"  style="border-radius: 100px !important;" >update</button>
		  </div>
		 </form>
		</div>
	  </div>
 </div>
<!-- /.content -->


<script>
$(document).on("click", "#changemyemail", function()
{
    
var options = { backdrop : 'static'}
$('#chagemyemail_modal').modal(options);   
    
});
</script>


<script>
$("#email_data").on("submit", submitemail);
function submitemail(event)
{
    event.preventDefault();
     
      if($("#email").val() == "")
     {
           swal({
                        type:'warning',
                        title:"email is required!",
                        text:""
                    })
         
         return false;
     }
      
      
       $.ajax({		
    		url: "{{route('changemyemail')}}",		
    		type: 'POST',		
    		data: {"_token":$('#token').val(),"email":$("#email").val()},
    		beforeSend: function() {
    					
    			loading = $("body").waitMe({
    				effect: 'timer',
    				text: 'change your primary email and send new verification code .........',
    				bg: 'rgba(255,255,255,0.90)',
    				color: '#555'
    			}); 
    					
    		},		
    		success: function(data)	{
    			
            	loading.waitMe('hide');
            	
            	 if(data == "exist_email")
            	{
            	     swal({
                        type:'error',
                        title:"email already taken",
                        text:"your input email is already exist in our record"
                    })
            	    
            	    return false;
            	}
            	
            	
            	swal({
    					  title: "",
    					  text:  data,
    					  type: 'success',
    					}).then(function (result) {
                            $('#chagemyemail_modal').modal('hide'); 
    				}); 
    		},		
    		error: function(error){ 		
    		console.log(error);		
    		}	
    	});	


}

</script>

            
            
<script>
$(document).on("click", "#requestnew_emailverification", function()
{
   //alert('This information has been sent to the email in your profile');
       
       $.ajax({		
    		url: "{{route('Sendverifyemail')}}",		
    		type: 'POST',		
    		data: {"_token":$('#token').val()},
    		beforeSend: function() {
    					
    			loading = $("body").waitMe({
    				effect: 'timer',
    				text: 'Sending New Verification Code.........',
    				bg: 'rgba(255,255,255,0.90)',
    				color: '#555'
    			}); 
    					
    		},		
    		success: function(data)	{
    			
            	loading.waitMe('hide');
            	
            	
            	swal({
    					  title: "",
    					  text:  data,
    					  type: 'success',
    					}).then(function (result) {
    
    				}); 
    		
    		
    		
    		
    		
    			
    		},		
    		error: function(error){ 		
    		console.log(error);		
    		}	
    	});	
    
    
});
</script>
			
		
				
@endsection