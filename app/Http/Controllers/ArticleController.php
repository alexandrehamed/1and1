<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Com;
use Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(6);
        $categories = Categorie::all();

        return view('articles.index' , [
            'articles' => $articles,
            'categories' =>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();

        return view('articles.create',[
            'categories' => $categories
        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {

        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required',
                'categorie_id' =>'required'
            ],
            [

                'title.required' => 'Un titre est requis. ',
                'content.required' => 'Un descriptif est requis . ',
                'categorie_id' => 'une categorie doit etre renseignée'
            ]
            );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1600, 1200)->save( public_path('/images/annonce/' . $filename ) );

            $article = Article::find($id);
            $article->image = $filename;
            $article->save();
        }

        Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'categorie_id'=>$request->categorie_id
        ]);


        //Ici, articles.index demande le fichier index dans le dossier articles , pas la route ! //

        return redirect()->route('article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)


        {


            $article = Article::find($id);


            return view ('articles.show', [
                'article' => $article,


            ]);




        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);


        return view ('articles.edit', ['article' => $article,

        ]);
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
        $this->validate($request,
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [

                'title.required' => 'Un titre est requis. ',
                'content.required' => 'Un descriptif est requis . '
            ]
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1600, 1200)->save( public_path('/images/annonce/' . $filename ) );

            $article = Article::find($id);
            $article->image = $filename;
            $article->save();
        }

        Article::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->back()->with('success', 'Article supprimé');

    }
    public function postComment(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        //$comment = new Comment();
        //$comment->comment = $request->get('comment');
        //$comment->article_id = $article->id;
        //$comment->save();

        Com::create([
            'commentaire'    => $request->get('commentaire'),
            'user_id' => Auth::user()->id,
            'article_id' => $article->id
        ]);



        return redirect()->back()->with('success', 'Message posté');

    }

    public function destroyCom($id)
    {
        $comment = Com::find($id);

        $comment->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé');
    }




}

