<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class CategoryController extends Controller
{
    public function Index(){
        $collection = (new MongoDB\Client)->FiveDStore->Categories;
        $categories = $collection->find();  
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function Create(){
        $collection = (new MongoDB\Client)->FiveDStore->Categories;
        $category = (Object)[
            "category" => request("category"),
            "description" => request("description"),
        ];
        $insertOneResult = $collection->insertOne($category);
        if($insertOneResult->getInsertedCount() == 1)
            return redirect(route('categories'))->with('mssg', "Category $category->category created with id of ".$insertOneResult->getInsertedID().".")->with('alerttype', "success");
        else
        return redirect(route('categories'))->with('mssg', "Error on creating the category. Please try again")->with('alerttype', "warning");

    }

    public function Edit($id){
        $collection = (new MongoDB\Client)->FiveDStore->Categories;
        $category = (Object)[
            "category" => request("editcategory"),
            "description" => request("editdescription"),
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId($id)
        ], [
            '$set' => $category
        ]);
        if ($updateOneResult->getModifiedCount() == 1)
            return redirect(route('categories'))->with('mssg', "Category $id edited")->with('alerttype', "primary");
        else
            return redirect(route('categories'))->with('mssg', "Category $id was not edited. Try again later.")->with('alerttype', "warning");    
    }

    public function Delete($id){
        $collection = (new MongoDB\Client)->FiveDStore->Categories;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new MongoDB\BSON\ObjectId($id)
            ]);
        if ($deleteOneResult->getDeletedCount() == 1)
            return redirect(route('categories'))->with('mssg', "Category $id deleted")->with('alerttype', "danger");
        else
            return redirect(route('categories'))->with('mssg', "Category $id was not deleted. Try again later.")->with('alerttype', "warning");
    }
}
