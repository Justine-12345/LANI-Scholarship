<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Scholar;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use View;
use Redirect;
class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        $announcements = DB::table('announcements')->select('*')->orderBy('announcementId', 'DESC')->get();
         $admin = Admin::where('admins.adminId','=',session('UserId'))->get()->toArray();
        
       return View::make('lani.announcement', compact('announcements', 'get_data', 'admin'));
    }

    public function scholarAnnounce()
    {
        //
        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];
        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);
        $announcements = DB::table('announcements')->select('*')->orderBy('announcementId', 'DESC')->get();
        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();
        
       return View::make('lani.announcementScholar', compact('announcements', 'get_data', 'scholar'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $announcement = new Announcement;
        $announcement->announcementDate = $input['announcementDate'];
        $announcement->announcementContent = $input['announcementContent'];
        $announcement->adminId = $input['adminId'];
        $announcement->save();

        return Redirect::route('userhomeAdmin')->with('success','Announcement publish successfully');
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
        $announcement = Announcement::find($id);
        $announcement->delete();
        return Redirect::route('userhomeAdmin')->with('success','Announcement deleted successfully');
    }
}
