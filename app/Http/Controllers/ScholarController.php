<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Models\Scholar;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use View;
use Illuminate\Support\Facades\Hash;
use \Datetime;
use Redirect;
use Session;
use DB;

class ScholarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $scholars = DB::table('scholars')
                ->select('*')->get()->toArray();

        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

         $admin = DB::table('admins')
             ->where('adminId', '=', session('UserId'))
             ->get()->first();

        return view('lani.scholarIndex', compact('scholars', 'admin','get_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->path());

        $warns = [
            'required' => 'Required',
            'min'=> 'To Short :attribute',
            'max' => 'To Long',
            'numeric' => 'Numbers Only',

        ];

        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'suffix' => ['max:255'],
            'middleName' => ['max:255'],
            'surname' => ['required','string', 'max:255'],
            'birthday'=> ['required','string', 'max:255'],
            'birthPlace'=> ['required','string', 'max:255'],
            'gender'=> ['required','string', 'max:255'],
            'civilStatus'=> ['required','string', 'max:255'],
            'religion'=> ['max:255'],
            'street'=> ['max:255'],
            'houseNumber'=> ['required','string', 'max:255'],
            'barangay'=> ['required','string', 'max:255'],
            'district'=> ['required','string', 'max:255'],
            'city'=> ['required','string', 'max:255'],
            'yearStart'=> ['required','numeric', 'max:3000', 'min:1900'],
            'contactNumber'=> ['required', 'numeric','min:1000000000', 'max:99999999999'],
            'scholarEmail' => ['required','string','email', 'max:255', 'unique:scholars'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],  $warns);


        
            $scholar = new Scholar;
            $scholar->scholarLastName = $request['surname'];
            $scholar->scholarFirstName = $request['firstName'];
            $scholar->scholarSuffix = $request['suffix'] ;
            $scholar->scholarMiddleName = $request['middleName'];

            $ad = $request['street']." ";
            $ad .= $request['houseNumber'];
            $scholar->scholarAddress = $ad;


            $scholar->scholarBarangay = $request['barangay'];

            $scholar->scholarCity = $request['city'];

            $scholar->scholarDistrict = $request['district'];

            $scholar->scholarStartedDate = $request['yearStart'];

            //Age Setter 
            $date = new DateTime($request['birthday']);
            $now = new DateTime();
            $interval = $now->diff($date);
            $t = $interval->y;
            $scholar->scholarAge = $t;

            $scholar->scholarGender =$request['gender'];

            $scholar->scholarEmail = $request['scholarEmail'];

            $scholar->scholarContactNum = $request['contactNumber'];

            $scholar->scholarReligion = $request['religion'];

            $scholar->scholarBirthDate = $request['birthday'];

            $scholar->scholarBirthPlace = $request['birthPlace'];

            $scholar->scholarCivilStatus = $request['civilStatus'];

            $scholar->scholarPassword = Hash::make($request['password']);

            // leave it in registration


            //username Setter
            $un = ucwords($request['firstName']." ");
            $un .= ucwords($request['surname']." ");
            if($request['suffix']){
            $un .= ucwords($request['suffix']." ");
             }

            $scholar->username =$un;

            $scholar->userTitle = "scholar";
             $scholar->scholarStatus = "Joining";
            $save = $scholar->save();

            

            if($save){
                $userData = ['scholarInfo' => Scholar::where('scholarEmail', '=', $request['scholarEmail'] )->first()];

                 $dataEx = (['scholarPassword']);
                 $get_data = array_diff($userData, $dataEx);

                 $request->session()->put('UserId',$get_data['scholarInfo']['scholarId']);

                 $request->session()->put('new','Congratulation You Created New Account');


        $username = $un;
         $message = <<<HTML

     

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
                                        <a href="#"><img src="https://pbs.twimg.com/profile_images/1645453746/avatar_400x400.jpg" alt="" style="padding:10px 0 5px;" /></a>
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program(Admin)</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                    Hello <b>$username</b> Thank you for registering on our scholarship program, please wait for the admin confirmation
                                     </p>
                                      </td>
                                    </tr>
                                  </table>
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                            Thank you and God Bless!!!</p>
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

        $sender = new MailController;
        $sender->send($request['scholarEmail'],'Lani Scholar Application',$message);

                return Redirect::route('userhome')->with($get_data);


            }else{
                return back()->with('fail','Something went wrong, try again later');
            }

    


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];
        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);

        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();

        // dd($accountView);
        return View::make('lani.account-view', compact('scholar', 'get_data')); 
    }


 public function showToAdmin($id)
    {
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
       

        $scholar = DB::table('scholars')
             ->where('scholarId', '=', $id)
             ->get()->first();
             // dd($scholar);
        // dd($accountView);
        return View::make('lani.account-viewAdmin', compact('scholar', 'get_data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Session::get('UserRole') == "admin"){
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
    }
    else{
        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];
        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);
    }



        // $scholar = DB::table('scholars')
        //     ->where('scholars.scholarId','=',$id)
        //     ->select('*')->get()->toArray();

        $scholar = Scholar::where('scholarId',$id)->get()->toArray();
       

            
        return View::make('lani.account-edit', compact('scholar', 'get_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
          function laniFileUpload(Request $request)
        {
            $i = 0;
            $fileName = '';
            if ($request->hasfile('scholarProfilePic')) {
                foreach ($request->file('scholarProfilePic') as $file) {

                    //for collecting the extension of the file
                    $extension = $file->getClientOriginalExtension();

                    //for assigning new name of the file
                    $name = 'scholarId-'.session('UserId').'.'.$extension;

                    //for uploading the file
                    $file->move(public_path() . '/images/'.'scholarProfilePic'.'/', $name);

                    $fileName = $name;
                    $i++;
                }
            }
            $i = 0;
            return $fileName;
        }

        // dd($request->all());
        $scholarAddress = $request->houseNumber.' '.$request->street;

        $scholarPassword = DB::table('scholars')
            ->where('scholarId', '=', $id)
            ->select('scholarPassword')->get()->toArray();
        // dd($scholarPassword);

        if($request->newPassword != $request->confirmPassword){
            return back()->with('fail', 'Password doesn\'t match');
        }
        elseif($request->scholarPassword == ''){
            $fname = $request->scholarFirstName;
            $lname = $request->scholarLastName;
            $username = $fname." ".$lname;
            $scholar = Scholar::find($id);
            $scholar = DB::table('scholars')
                ->where('scholarId', '=', $id)
                ->update(['scholarFirstName' => $request->scholarFirstName, 'scholarSuffix' => $request->scholarSuffix, 'scholarMiddleName' => $request->scholarMiddleName, 'scholarLastName' => $request->scholarLastName, 'scholarBirthDate' => $request->scholarBirthDate, 'scholarBirthPlace' => $request->scholarBirthPlace, 'scholarGender' => $request->scholarGender, 'scholarCivilStatus' => $request->scholarCivilStatus, 'scholarReligion' => $request->scholarReligion, 'scholarAddress' => $scholarAddress, 'scholarBarangay' => $request->scholarBarangay, 'scholarDistrict' => $request->scholarDistrict, 'scholarCity' => $request->scholarCity, 'scholarStartedDate' => $request->scholarStartedDate, 'scholarContactNum' => $request->scholarContactNum, 'username' => $username]);

            if($request->scholarProfilePic != '')
            {   
            $old_pic = $request->all()['old_scholarProfilePic'];

            File::delete(public_path('images/scholarProfilePic/'.$old_pic));
            

                $fileName = laniFileUpload($request);
                $scholar = DB::table('scholars')
                    ->where('scholarId', '=', $id)
                    ->update(['scholarProfilePic' => $fileName]);
            }
        }
        elseif(Hash::check($request->scholarPassword, $scholarPassword[0]->scholarPassword) && $request->newPassword != '')
        {
            $scholar = Scholar::find($id);
            $scholar = DB::table('scholars')
                ->where('scholarId', '=', $id)
                ->update(['scholarFirstName' => $request->scholarFirstName, 'scholarSuffix' => $request->scholarSuffix, 'scholarMiddleName' => $request->scholarMiddleName, 'scholarLastName' => $request->scholarLastName, 'scholarBirthDate' => $request->scholarBirthDate, 'scholarBirthPlace' => $request->scholarBirthPlace, 'scholarGender' => $request->scholarGender, 'scholarCivilStatus' => $request->scholarCivilStatus, 'scholarReligion' => $request->scholarReligion, 'scholarAddress' => $scholarAddress, 'scholarBarangay' => $request->scholarBarangay, 'scholarDistrict' => $request->scholarDistrict, 'scholarCity' => $request->scholarCity, 'scholarStartedDate' => $request->scholarStartedDate, 'scholarContactNum' => $request->scholarContactNum,'scholarPassword' => Hash::make($request->newPassword)]);

            if($request->scholarProfilePic != '')
            {
                $fileName = laniFileUpload($request);

                $scholar = DB::table('scholars')
                    ->where('scholarId', '=', $id)
                    ->update(['scholarProfilePic' => $fileName]);
            }
        }
        elseif(!Hash::check($request->scholarPassword, $scholarPassword[0]->scholarPassword))
        {
            return back()->with('fail', 'Incorrect Password');
        }

        
        
        return Redirect::route('scholar.show',$id)->with('success', 'Account is Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     
    if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }
        $scholar = Scholar::find($id);
        $scholar->scholarStatus = "banned";
        $scholar->save();
         $username = $scholar->username;
         $message = <<<HTML

     

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
                                        <a href="#"><img src="https://pbs.twimg.com/profile_images/1645453746/avatar_400x400.jpg" alt="" style="padding:10px 0 5px;" /></a>
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                    Hello <b>$username</b> the Admin of LANI Scholarship Program decided to <b>ban</b> your account. Due to this ban, you will be unable to submit your application. If you have more questions please message us in our Facebook Page. 
                                     </p>
                                      </td>
                                    </tr>
                                  </table>


                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#0C81EA; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="https://m.facebook.com/Scholarship-Secretariat-Taguig-243532322429561/" target="_blank" style="color:white; text-decoration:none;">LANI FB Page</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                            Thank you and God Bless!!!</p>
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

        $sender = new MailController;
        $sender->send($scholar->scholarEmail,'Lani Scholar Application',$message);


        return Redirect::route('scholar.index')->with('success', 'Scholar was banned successfully');
    }


    public function sort(Request $request)
    {
        $input = $request->all();
       
        if($request->label == "" && $request->order == ""){
            return redirect()->back();
        }
        if ($request->label == "") {
            $input['label'] = "scholarId";
        }
        if ($request->order == "") {
            $input['order'] = "ASC";
        }

     $scholars = DB::table('scholars')
             ->orderBy(@$input['label'],@$input['order'])
             ->get()->toArray();

    $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
             
    return view('lani.scholarIndex', compact('scholars', 'get_data'));

    }

     public function accept($id)
    {
        //
        if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }
      
        $scholar = Scholar::find($id);

        $scholar->scholarStatus = "new";
        $scholar->save();

        $username = $scholar->username;
         $message = <<<HTML

     

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
                                        <a href="#"><img src="https://pbs.twimg.com/profile_images/1645453746/avatar_400x400.jpg" alt="" style="padding:10px 0 5px;" /></a>
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                    Hello <b>$username</b> the Admin of LANI Scholarship Program <b>Activate</b> your account you will be now enable to submit your application if the submission is open. If you have more questions please message us in our Facebook Page. 
                                     </p>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#0C81EA; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="https://m.facebook.com/Scholarship-Secretariat-Taguig-243532322429561/" target="_blank" style="color:white; text-decoration:none;">LANI FB Page</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">
                                            Thank you and God Bless!!!</p>
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

        $sender = new MailController;
        $sender->send($scholar->scholarEmail,'Lani Scholar Application',$message);


        return Redirect::route('scholar.index')->with('success', 'Scholar is added successfully');
    }
}
