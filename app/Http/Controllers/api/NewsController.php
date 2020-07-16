<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\News;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{

    protected $rules = [
        'name' => 'required|min:3|max:15',
        'title' => 'required|min:3|max:15',
        'description' => 'required|min:5|max:15',
        'author_id' => 'required|min:5|max:15',
        'rubric_id' => 'required|min:5|max:15',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return response()->json($news, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $rubrics = News::create($request->all());
        return response()->json($rubrics, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $news = News::where('title', $name)->first();
        return response()->json($news, 200);
    }

    public function getById($id)
    {
        $news = News::where('id', $id)->first();
        return response()->json($news, 200);
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
