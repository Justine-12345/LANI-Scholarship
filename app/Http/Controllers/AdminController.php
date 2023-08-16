<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Hash;
use Redirect;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = DB::table('admins')
                ->select('*')->get()->toArray();

        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

        return view('lani.adminIndex', compact('admins', 'get_data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.registerAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       //dd($request->all());
        $rules = [
            'adminFirstName' =>  'required',
            'adminMiddleName' =>  'nullable',
            'adminLastName' =>  'required',
            'adminBirthDate' =>  'required',
            'adminAddressline' =>  'required',
            'adminEmail' =>  'required|email|unique:admins',
            'adminPassword' =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);

    if ($validator->passes()) {
        $input = $request->all();
        $uname = $input['adminFirstName']." ";
        $uname .=$input['adminLastName'];
        $passwordHash = Hash::make($input['adminPassword']);
       
        $input['adminPassword']= $passwordHash;
        $input['username'] = $uname;


         $username = $uname;
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
                                    Hello <b>$username</b> Thank you for registering on the system, please wait for the admin confirmation.
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
        $sender->send($input['adminEmail'],'Lani Scholar Application',$message);
        $admin = Admin::create($input);
    }

     return redirect()->back()->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = DB::table('admins')
             ->where('adminId', '=', $id)
             ->get()->first();

    $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        return view('lani.adminShow', compact('admin', 'get_data'));

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
    if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }



     $admin = DB::table('admins')
             ->where('adminId', '=', $id)
             ->get()->first();

    $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        return view('lani.adminEdit', compact('admin', 'get_data'));

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
        if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }
        // dd($request);
          $rules = [
            'adminFirstName' =>  'required',
            'adminMiddleName' =>  'nullable',
            'adminLastName' =>  'required',
            'adminBirthDate' =>  'required',
            'adminAddressline' =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);

    if ($validator->passes()) {
        $input = $request->all();
        $uname = $input['adminFirstName']." ";
        $uname .= $input['adminLastName'];
        
        $input['username'] = $uname;
        
        $admin = Admin::find($id);
        $admin->update($input);
        return Redirect::route('admin.index')->with('success', 'Admin was updated successfully');
    }

     return redirect()->back()->withInput()->withErrors($validator);
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
        // dd($id);
        if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }
        $admin = Admin::find($id);

        $admin->adminStatus = "banned";
        $admin->save();

         $username = $admin->username;
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program (Admin)</h2>

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
        $sender->send($admin->adminEmail,'Lani Scholar Application',$message);


        return Redirect::route('admin.index')->with('success', 'Admin was banned successfully');
    }

    public function sort(Request $request)
    {
        $input = $request->all();
       
        if($request->label == "" && $request->order == ""){
            return redirect()->back();
        }
        if ($request->label == "") {
            $input['label'] = "adminId";
        }
        if ($request->order == "") {
            $input['order'] = "ASC";
        }

     $admins = DB::table('admins')
             ->orderBy(@$input['label'],@$input['order'])
             ->get()->toArray();

    $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
             
    return view('lani.adminIndex', compact('admins', 'get_data'));

    }

     public function accept($id)
    {
        //
        if(Session::get('UserMember') != "main"){
        return redirect()->back();
    }
      
        $admin = Admin::find($id);

        $admin->adminStatus = "member";
        $admin->save();

        $username = $admin->username;
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program (Admin)</h2>

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
        $sender->send($admin->adminEmail,'Lani Scholar Application',$message);

        return Redirect::route('admin.index')->with('success', 'Admin is added as member successfully');
    }
}
