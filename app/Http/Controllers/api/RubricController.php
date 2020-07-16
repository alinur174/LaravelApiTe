<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RubricController extends Controller
{

    protected  $rules = [
        'name' => 'required|min:3|max:15'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubrics = Rubrics::all();
        return response()->json($rubrics, 200);
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

        $rubrics = Rubrics::create($request->all());
        return response()->json($rubrics, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rubricName)
    {
        $id = DB::table('rubrics')->where('name', $rubricName)->value('id');
        $news = Rubrics::findOrFail($id)->news;
        if (is_null($id) || is_null($news)) return response()->json('Запись не найдена', 401);
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
