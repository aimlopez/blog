<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Category;

class CategoryController extends Controller
{
    public function getCategoriesIndex(){
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.blog.categories', ['categories' => $categories]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => "required|max:60",
        ]);

            $category = New Category();
            $category->name = $request['name'];
            $category->save();
        
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return Response::json($response);
    }
    public function destroy($category_id){

        $category = Category::find($category_id);
        $category->delete();
        
        $response = array(
            'status' => 'success',
            'msg' => 'Category deleted successfully',
        );
        return Response::json($response);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => "required|max:60",
        ]);
        
        $category = Category::find($request['id']);
        $category->name = $request['name'];
        $category->update();

        $response = array(
            'status' => 'success',
            'msg' => 'Category updated successfully',
        );
        return Response::json($response);

    }
}
