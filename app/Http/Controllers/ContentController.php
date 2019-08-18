<?php
/**
 * Controller to manage the content
 */
namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents= Content::all();
        return view('contentindex',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
      return view('contentcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $content = new Content();
      if($request->get('title') && $request->get('description')) {
        try {
          $content->title = trim(strip_tags($request->get('title')));
          $content->description = trim(strip_tags($request->get('description')));
          $content->tags = trim(strip_tags($request->get('tags')));
          $content->save();
          return redirect('content')->with('success', "Content '{$content->title}' has been successfully added");
        } catch (Exception $e) {
            //add exception message to the logger
            logger('Problem with create content:'.$e->getMessage(),$e);
        }
      } else {
        return redirect('add')->with('failure', "Content Title and description cannot be empty");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $contents= Content::all()->sortByDesc('created_at');
      return view('contentshow',compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $content = Content::find($id);
      return view('contentedit',compact('content','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
      $content= Content::find($id);
      if(!$request->get('title') || !$request->get('description')) {
        return redirect('/edit/'.$id)->with('failure', "Content Title and Description cannot be empty");
      }
      try {
        $content->title = trim(strip_tags($request->get('title')));
        $content->description = trim(strip_tags($request->get('description')));
        $content->tags = trim(strip_tags($request->get('tags')));
        $content->save();
        return redirect('content')->with('success', "Content '{$content->title}' has been successfully updated");
      } catch (Exception $e) {
        //add exception message to the logger
        logger('Problem with update content:'.$e->getMessage(),$e);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $content = Content::find($id);
        $content->delete();
        return redirect('content')->with('success', "Content for '{$content->title}' has been  deleted");
      } catch (Exception $e) {
        //add exception message to the logger
        logger('Problem with delete content:'.$e->getMessage(),$e);
      }
    }
}
