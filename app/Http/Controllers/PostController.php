<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholar;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Comment;
use View;
use DB;
use Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];

        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);



        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();
        $posts = DB::table('posts')
                ->leftJoin('scholars','posts.scholarId', 'scholars.scholarId')
                ->where('scholars.scholarId','=', session('UserId'))
                ->orderBy('posts.postId','DESC')->get()->toArray();


        $comments = DB::table('comments')
                ->leftJoin('scholars','comments.scholarId', 'scholars.scholarId')
                ->leftJoin('admins','comments.adminId', 'admins.adminId')
                ->select('admins.username AS adminUsername','scholars.username AS scholarUsername', 'admins.userTitle AS adminTitle', 'scholars.userTitle AS ','admins.userTitle','scholars.userTitle' , 'commentDate', 'postId','commentId','commentContent', 'scholarProfilePic')
                ->get()->toArray();

        // dd($posts);
            
        return View::make('lani.post', compact('scholar', 'posts', 'comments', 'get_data'));
    }

     public function indexAdmin()
    {

        //
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];
        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);



        $admin = Admin::where('admins.adminId','=',session('UserId'))->get()->toArray();

        $posts = DB::table('posts')
                ->leftJoin('admins','posts.adminId', 'admins.adminId')
                ->where('admins.adminId','=', session('UserId'))
                ->orderBy('posts.postId','DESC')->get()->toArray();


        $comments = DB::table('comments')
                ->leftJoin('scholars','comments.scholarId', 'scholars.scholarId')
                ->leftJoin('admins','comments.adminId', 'admins.adminId')
                ->select('admins.username AS adminUsername','scholars.username AS scholarUsername', 'admins.userTitle AS adminTitle', 'scholars.userTitle AS scholarTitle', 'commentDate', 'postId','commentId','commentContent' , 'scholarProfilePic')
                ->get()->toArray();

        // dd($posts);
            
        return View::make('lani.postAdmin', compact('admin', 'posts', 'comments', 'get_data'));
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
    
        if(!isset($request->all()['postContent'])){
        return Redirect::route('post.index');
        }
        
       Post::create($request->all());
       return redirect()->back()->with('success','Posted Successfully');

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
        dd($id);
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
        $comments = DB::table('comments')
                    ->where('postId','=',$id)
                    ->get()->toArray();
                   

        foreach ($comments as $comment) {
            $delComment = Comment::where('commentId','=',$comment->commentId);
            $delComment->delete();
        }

        $post = Post::where('postId','=',$id);
        $post->delete();

        return redirect()->back()->with('success','Deleted Successfully');

    }
}
