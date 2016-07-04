<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aforism;
use Auth;
use App\Jobs\AforismFormFields;
use App\Http\Requests\AforismCreateRequest;
use App\Http\Requests\AforismUpdateRequest;


class AforismController extends Controller
{
     public function __construct()
    {
         $this->middleware('auth');
          $this->middleware('aforismBelongsToUser', ['only' => [
            'edit',
            'update',
            'delete',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aforisms = Aforism::with('tagged')
                    ->where('user_id', '=', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(config('aforism.aforisms_per_page_priv'));
        $aforisms->setPath('');
        return view('admin.aforism.index')->withAforisms($aforisms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dispatch(new AforismFormFields());

        return view('admin.aforism.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AforismCreateRequest $request)
    {
        $aforism = new Aforism;
        $aforism->user_id = $request->user()->id;
        $aforism->content = $request->content;
        $aforism->răspuns = $request->răspuns;
        $aforism->save();
        $aforism->tag($request->tags);

        return redirect()->route('admin.aforisme.index')->withStatus('Aforismul a fost adăugat.');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = $this->dispatch(new AforismFormFields($id));
        
        return view('admin.aforism.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AforismUpdateRequest $request, $id)
    {
        $aforism = Aforism::findOrFail($id);
        // $aforism->fill($request->aforismFillData());
        $aforism->content = $request->content;
        $aforism->răspuns = $request->răspuns;
        $aforism->save();
        $aforism->retag($request->tags);

        return redirect()->route('admin.aforisme.index')->withStatus('Aforism salvat.');
    }

    /**
     * Remove the aforism from database.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   
        
        $aforism = Aforism::findOrFail($id);
        $aforism->delete();

        return redirect()->route('admin.aforisme.index')->withStatus('Aforism sters');
    }

}
