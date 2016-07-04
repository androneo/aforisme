<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jobs\AforismIndexData;
use App\Aforism;


class AforismeController extends Controller
{
    public function index(Request $request)
    {
    	$slug = $request->slug;
    	$user = urldecode($request->user);
        $keyword = $request->keyword;

    	$data = $this->dispatch(new AforismIndexData($slug,$user,$keyword));
    	return view('aforism.index', $data);
    }

    /**
     * adauga aforism la aforismele favorite ale userului logat
     */
    public function adaugaFavorit(Request $request)
    {
        $id = $request->id;
        $aforism = Aforism::whereId($id)->first();
        $result = $aforism->like();
        $count = $aforism->likeCount;
        return response()->json(["result" => $result, "count" => $count]);
    }

    /**
     * elimină aforism din aforismele favorite ale userului logat
     */
    public function eliminaFavorit($id)
    {
        $aforism = Aforism::whereId($id)->first();
        $result = $aforism->unlike();
        $count = $aforism->likeCount;
        return response()->json(["result" => $result, "count" => $count]);
    }
}
