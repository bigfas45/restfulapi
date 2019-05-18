<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class categoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return $this->showAll($categories);
    }

  
    public function store(Request $request)
    {
        //
        $rules = [
            'name'  => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);
        $newCategory = Category::create($request->all());

        return $this->showOne($newCategory, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
      return  $this->showOne($category);
    }

    public function update(Request $request, Category $category)
    {
        //
        $category->fill($request->only([
            'name',
            'description',
        ]));
        if(!$category->isDirty()){
            return $this->errorResponse('You need to specify any diffrent value to update', 422);
        }
        $category->save();

        return $this->show($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return $this->showOne($category);
    }
}
