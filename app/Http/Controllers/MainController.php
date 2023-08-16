<?php
namespace App\Http\Controllers;
use App\Models\Scholar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailController;
use Redirect;
use View;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MainController extends Controller
{	

	function home(){
		$userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];

		$dataEx = (['scholarPassword']);
		$get_data = array_diff($userData, $dataEx);


        $posts = DB::table('posts')
                ->leftJoin('scholars','posts.scholarId', 'scholars.scholarId')
                ->leftJoin('admins','posts.adminId','admins.adminId')
                ->select('scholars.*','admins.*','scholars.username AS scholarUsername','admins.username AS adminUsername', 'admins.userTitle AS adminTitle', 'scholars.userTitle AS scholarTitle', 'posts.*')
                ->orderBy('posts.postId','DESC')->get()->toArray();
              

        $comments = DB::table('comments')
                ->leftJoin('scholars','comments.scholarId', 'scholars.scholarId')
                ->leftJoin('admins','comments.adminId', 'admins.adminId')
                ->select('scholars.*','admins.*','scholars.username AS scholarUsername','admins.username AS adminUsername', 'admins.userTitle AS adminTitle', 'scholars.userTitle AS scholarTitle', 'comments.*')
                ->get()->toArray();
    $announcements = DB::table('announcements')->select('*')->orderBy('announcementId', 'DESC')->get();

 $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();

   Session::put('UserMember',$scholar[0]['scholarStatus']);
   Session::put('UserRole',$scholar[0]['userTitle']);

        
		return View::make('lani.home', compact('get_data', 'posts', 'comments', 'scholar', 'announcements'));
	}

    function login(){
    	return view('auth.login');
    }

    function logout(){
    	if(session()->has('UserId')){
    		session()->pull('UserId');
    		session()->pull('new');
    		return Redirect::route('login');
    	}
    }

    function check(Request $request){
    	if ($request) {
    		$request->validate([
    		"scholarEmail" => 'required|email',
    		"scholarBirthdate" => 'required',
    		"scholarPassword" => 'required|min:8',
    		
    	]);
    	}

    	

    	$userInfo = Scholar::where('scholarEmail','=', $request->scholarEmail)->first();

    	if(!$userInfo){
    		return back()->with('fail','Scholar Account Not Found');
    	}
    	else{
    		
    			if($request->scholarBirthdate != $userInfo->scholarBirthDate){
    				return back()->with('fail', 'Incorrect Birthday');
    			 }
    			elseif(!Hash::check($request->scholarPassword, $userInfo->scholarPassword)){
    				return back()->with('fail', 'Incorrect Password');
    	   		 }
    			 else{
    				$request->session()->put('UserId',$userInfo->scholarId);
                    $request->session()->put('UserMember',$userInfo->scholarStatus);
                     $request->session()->put('UserRole',$userInfo->userTitle);

    				return Redirect::route('userhome');
    			 }


            }

}

    //View reset password form
    function forgotpassword(Request $request){
        return view('auth.passwords.email');
    }



    //Validate email for password reset
    function validatepassword(Request $request){
        //You can add validation login here
        $scholar = DB::table('scholars')->where('scholarEmail', '=', $request->scholarEmail)->first();


        //Check if the user exists
        if (@count($scholar) < 1) {
            return redirect()->back()->with('error','This account does not exist');
        }
        $tk = Str::random(60);
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->scholarEmail,
            'token' => $tk,
            'created_at' => Carbon::now(),
        ]);

        
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->scholarEmail)->first();

        if ($this->sendResetEmail($request->scholarEmail, $tokenData->token)) {
            return redirect()->back()->with('send', 'A reset link has been sent to your email address.');
        } 
        else {
            return redirect()->back()->with('error','A Network Error occurred. Please try again.');
        }


      }


    //send genrated url via email
    private function sendResetEmail($email, $token)
        {

        //Retrieve the user from the database
        $scholarInfo = DB::table('scholars')->where('scholarEmail', $email)->select('scholarEmail')->first();

    

        //Generate, the password reset link. The token generated is embedded in the link
        $link = 'lanischolar.test/confirm_password/' . $token . '/' . $scholarInfo->scholarEmail;

        $finalLink = <<<HTML
                 <style type="text/css">
          /*RESET  -- this may be ignored by some email clients*/
            body{
                margin:0;
                padding:0;
            }

            img{
                border:0 none;
                height:auto;
                line-height:100%;
                outline:none;
                text-decoration:none;
            }

            a img{
                border:0 none;
            }

            .imageFix{
                display:block;
            }

            table, td{
                border-collapse:collapse;
            }

            #bodyTable{
                height:100% !important;
                margin:0;
                padding:0;
                width:100% !important;
            }
          /*END RESET*/
         </style>



         <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailContainer">      
                  <tr>
                    <td align="center" valign="top" style="padding:0;">
                      
                      
                        <!--HEADER BLACK BAR WITH LOGO-->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailHeader" style="background:#666666; color:#ffffff; margin:0;">
                          <tr>
                            <td align="center">

                              <table border="0" cellpadding="0" cellspacing="0" width="600">
                                  <tr>
                                      <td align="left" valign="middle">
                                        <a href="#"><img src="https://pbs.twimg.com/profile_images/1645453746/avatar_400x400.jpg" alt="" style="padding:10px 0 5px; height: 100px; width: 100px" /></a>
                                      </td>
                                  </tr>
                              </table>
                            
                            </td>
                          </tr>
                        </table>
                      
                      
                      
                      
                      
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody">
                            <tr>
                                <td align="center" valign="top">
                                  
                                  
                                  <!--MAIN BANNER IMAGE-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#FFFFFF; margin-bottom:10px;">
                                    <tr>
                                      <td>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CONTENT COPY-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">Confirm Your Email</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:20px;">You are just one step away</p>
                                      </td>
                                    </tr>
                                  </table>



                                
                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#800000; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="$link" target="_blank" style="color:#FFFFFF; text-decoration:none;">Confirm Email</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">Click the confirmation button to reset your password</p>
                                      </td>
                                    </tr>
                                  </table>
                                  
                                                           
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
              
                        </table>
                    </td>
                </tr>
            </table>

        HTML;

       

        // try {
        //Here send the link with CURL with an external email API 
            $sender = new MailController;
            $sender->send($scholarInfo->scholarEmail,'Password Reset', $finalLink);
            return View::make('auth.passwords.email')->with('success','Password reset link successfully send to your gmail');
           // return true;
        // } catch (\Exception $e) {
        //     return false;
        // }
         }


         public function resetPassword(Request $request){
          //Validate input

          $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:scholars,scholarEmail',
        'password' => 'required|confirmed',
        'token' => 'required' ]);

          //check if payload is valid before moving on
          if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
        }

        $password = $request->password;

        // Validate the token
            $tokenData = DB::table('password_resets')
            ->where('token','=' ,$request->token)->first();

           

        // Redirect the user back to the password reset request form if the token is invalid
            if (!$tokenData) return view('auth.passwords.email');

            $scholar = Scholar::where('scholarEmail', $tokenData->email)->first();
             

        // Redirect the user back if the email is invalid
            if (!$scholar) return redirect()->back()->with('email', 'Email not found');

        //Hash and update the new password
            $scholar->scholarPassword = Hash::make($password);
            $scholar->save(); //or $user->save();
           

        //login the user immediately they change password successfully
        // Auth::login($user);
        $request->session()->put('UserId',$scholar->scholarId);
        

        //Delete the token
        DB::table('password_resets')->where('email', $scholar->scholarEmail)
        ->delete();


        //Send Email Reset Success Email
        // if ($this->sendSuccessEmail($tokenData->email)) 
        if ($scholar) 
        {
             return Redirect::route('userhome');

        } else {
            return redirect()->back()->with('email','A Network Error occurred. Please try again.');
        }

         }




     public function about(){
        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];

        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);

         $scholar = Scholar::where('scholarId',session('UserId'))->get()->toArray();
        return view('lani.about', compact('scholar', 'get_data'));
     }


     public function visitor(){
     return view('lani.home-visitor');
     }




}