<?php

namespace App\Http\Controllers\api;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    protected  $rules = [
        'name' => 'required|min:3|max:15',
        'email' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Authors::all();
        return response()->json($authors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) return response()->json($validator->errors(), 400);
        $author = Authors::create($request->all());
        return response()->json($author, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($authorName)
    {
        $authorId = DB::table('authors')->where('name', $authorName)->value('id');
        $news = Authors::findOrFail($authorId)->news;
//        if (is_null($authorId) || is_null($news)) return response()->json('Запись не найдена', 401);
        return response()->json($news, 200);
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
