<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use Conner\Tagging\Model\Tag as Tag;

class TagController extends Controller
{
    protected $fields = [
        'name' => '',
        'description' => '',
    ];

    public function __construct()
    {
         $this->middleware('admin', ['except' => ['index']]);
    }
    
    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.tag.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect()->route('admin.etichete.index')->withStatus("Eticheta '$tag->name' a fost creată.");
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $data = ['slug' => $slug];

        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect()->route('admin.etichete.index')->withStatus("Eticheta '$tag->name' a fost modificată");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tag->delete();

        return redirect()->route('admin.etichete.index')
            ->withStatus("Eticheta '$tag->name' a fost ștearsă.");
    }
}
