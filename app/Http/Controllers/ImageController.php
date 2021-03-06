<?php namespace App\Http\Controllers;
use App\Http\Requests;
use Carbon\Carbon;
use Guzzle\Tests\Plugin\Redirect;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller {

    /**
     * Show the form for uploading a new resource.
     *
     * @return Response
     */
    public function upload(){
        // Redirect to image upload form

        return view('imageupload');
    }

    /**
     * Store a newly uploaded resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return redirect('/home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show(Request $request)
    {
        $images = Image::all();
        return view('showLists', compact('images'));

    }


}