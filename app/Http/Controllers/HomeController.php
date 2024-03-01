<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //*
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('home')->with([
            'posts'=>  $posts
        ]);
          // Afficher les données et arrêter l'exécution

    }
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('show')->with([
            'post'=>  $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(PostRequest $Request)
    {
        // $this->validate($Request,[
        //     'title' =>'required |min:3|max:100',
        //     'body' =>'required |min:10|max:1000',

        // ]);

        //image uploads:
        if($Request->has('image')){
            //name image jibha men l input
            $file = $Request->image;
            //ajoute time 3la name image
            $image_name = time().'_'.$file->getClientOriginalName() ;
            // send time_image a dossier uploads kayn f public
            $file->move(public_path('uploads'),$image_name);

        }
        post::create([

            "title"=> $Request->title,
            "body"=> $Request->body,
            //afiichier image fl 'home'
            "image"=> $image_name,
            "slug"=> Str::slug($Request->title),

        ]);
        return redirect()->route('home')->with([
            'success'=>'article ajoutér ',

        ]);
        // methode 2
        // $post = new Post();
        // $post->title = $Request->title;
        // $post->slug = Str::slug($Request->title);
        // $post->body = $Request->body;
        // $post->image = "https://via.placeholder.com/640x480.png/00ee55?text=new poste";

        // $post->save();

    }

    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('edit')->with([
            'post'=>  $post
        ]);

    }

    public function update(PostRequest $Request, $slug)
    {
        $post = Post::where('slug',$slug)->first();
        if($Request->has('image')){
            //name image jibha men l input
            $file = $Request->image;
            //ajoute time 3la name image
            $image_name = time().'_'.$file->getClientOriginalName() ;
            // send time_image a dossier uploads kayn f public
            $file->move(public_path('uploads'),$image_name);
            //delete image l9dima pour evitér la repitision
            unlink(public_path('uploads/').$post->image);
            $post->image =$image_name;

        }
        $post->update([
            "title"=> $Request->title,
            "body"=> $Request->body,
            "image"=> $post->image,
            "slug"=> Str::slug($Request->title),

        ]);
        return redirect()->route('home')->with([
            'success'=>'article modifiér  success',

        ]);

    }

    public function delete($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $post->delete();
        return redirect()->route('home')->with([
            'success'=>'article Supprimér',
        ]);

    }

}
