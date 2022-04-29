<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;

class TagController extends Controller
{
    /**
     * Llista els resultats de la busqueda
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $validated = $request->validate([
            'search' => 'required',
        ]);
        $text = $validated['search'];

        //busquem posts que tinguin el contingut en el titol
        $posts_by_name = Post::where('title', 'like', '%' . $text . '%')->get();

        $post_tag_by_name = [];
        $i = 0;
        foreach ($posts_by_name as $post) {
            $post_tag_by_name[$i] = $post->tags()->get();
            $i++;
        }

        //busquem tags que tinguin el contingut de la busca en el seu nom
        $tags = Tag::where('text', 'like', '%' . $text . '%')->get();

        $post_tag_by_tag = [];
        $i = 0;
        foreach ($tags as $tag) {
            $posts_by_tag = $tag->posts()->get();
            foreach ($posts_by_tag as $post) {
                $post_tag_by_tag[$i] = $post->tags()->get();
                $i++;
            }
        }
        //dd($posts_by_name, $posts_by_tag);
        return view('searches', ['posts_by_name' => $posts_by_name, 'post_tag_by_name' => $post_tag_by_name, 'posts_by_tag' => $posts_by_tag, 'post_tag_by_tag' => $post_tag_by_tag]);
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
     * @param  $tag_array array de strings de tags
     * @return \Illuminate\Http\Response
     */
    public function store($tags_array, Post $post)
    {
        //
        foreach ($tags_array as $tag) {
            $t = Tag::where('text', $tag)->get();
            //si aquesta consulta no retorna res, vol dir que el tag no existeix a la taula i per tant el creem
            if (count($t) == 0) {
                $newTag = Tag::create(['text' => $tag]);
                $post->tags()->attach($newTag);
            } else {
                $post->tags()->attach($t);
            }
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
        //
        $tag = Tag::find($id);

        $posts = $tag->posts()->get();

        $post_tag = [];
        $i = 0;
        foreach ($posts as $post) {
            $post_tag[$i] = $post->tags()->get();
            $i++;
        }

        return view('tags.show', ['posts' => $posts, 'post_tag' => $post_tag]);
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
    }
}
