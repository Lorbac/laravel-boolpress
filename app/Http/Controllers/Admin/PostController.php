<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDO I DATI
        $request->validate([
            "title" => "required | max:255",
            "content" => "required",
            "category_id" => "nullable|exists:categories,id"
        ]);

        $form_data = $request->all();

        $new_post = new Post();

        $new_post->fill($form_data);

        // INSERIAMO LO SLUG

        $slug = Str::slug($new_post->title, "-"); //DI BASE METTE IL TRATTINO TRA UNA PAROLA E L'ALTRA
        // $slug_base = $slug;

        $slug_presente = Post::where("slug", $slug)->first();

        $contatore = 1;
        while($slug_presente) {
            $slug = $slug . "-" . $contatore;
            $slug_presente = Post::where("slug", $slug)->first();
            $summ_cont = 0;
            $summ_cont += $contatore++;
            str_replace($contatore, $summ_cont, $slug);
        }

        $new_post->slug = $slug;

        $new_post->save();

        return redirect()->route("admin.posts.index")->with("created", "Il post è stato correttamente salvato");
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!$post) {
            abort(404);
        }

        $categories = Category::all();

        // $data = [
        //     "post" => $post,
        //     "categories" => $categories
        // ]

        return view("admin.posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //VALIDO I DATI
        $request->validate([
            "title" => "required | max:255",
            "content" => "required"
        ]);
        
        $form_data = $request->all();

        //VERIFICO SE IL TITOLO RICEVUTO DAL FORM E' DIVERSO DAL VECCHIO TITOLO
        if($form_data["title"] != $post->title) {

            //E' STATO MODIFICATO IL TITOLO QUINDI ANCHE LO SLUG

            $slug = Str::slug($form_data["title"], "-"); //DI BASE METTE IL TRATTINO TRA UNA PAROLA E L'ALTRA
            // $slug_base = $slug;

            $slug_presente = Post::where("slug", $slug)->first();

            $contatore = 1;
            while($slug_presente) {
                $slug = $slug . "-" . $contatore;
                $slug_presente = Post::where("slug", $slug)->first();
                $contatore++;
            }

            $form_data["slug"] = $slug;
        }

        $post->update($form_data);

        return redirect()->route("admin.posts.index")->with("updated", "Post correttamente aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index")->with("deleted", "Post eliminato");
    }
}
