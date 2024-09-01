<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function getData(Request $request)
    {
        $categories = Category::all();

        // dd($categories);

        return DataTables::of($categories)
             ->addIndexColumn()
             ->addColumn('catImg', function ($category) {
                return '<img src="'. asset($category->cat_img) .'" alt="" style="width: 65px;">';
             })
             ->addColumn('status', function ($category) {
                if ($category->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="'.$category->id.'" data-status="'.$category->status.'">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="'.$category->id.'" data-status="'.$category->status.'">Deactive</span>';
                }
            })
            ->addColumn('action', function ($category) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $category->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $category->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['catImg', 'status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $category = new Category();

        $category->cat_name    = $request->cat_name;
        $category->cat_slug    = Str::slug($request->cat_name);
        $category->status      = $request->status;

        if( $request->file('cat_img') ){
            $cat_img = $request->file('cat_img');

            $imageName          = microtime('.') . '.' . $cat_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/category/';
            $cat_img->move($imagePath, $imageName);

            $category->cat_img   = $imagePath . $imageName;
        }

        $category->save();

        return response()->json(['message' => 'successfully Category Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Category::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return response()->json(['success' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $category = Category::find($id);

        $category->cat_name    = $request->cat_name;
        $category->cat_slug    = Str::slug($request->cat_name);
        $category->status      = $request->status;

        if( $request->file('cat_img') ){
            $cat_img = $request->file('cat_img');

            if( !is_null($category->cat_img) && file_exists($category->cat_img) ){
                   unlink($category->cat_img);
            }

            $imageName          = microtime('.') . '.' . $cat_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/category/';
            $cat_img->move($imagePath, $imageName);

            $category->cat_img   = $imagePath . $imageName;
        }

        $category->save();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if ( !is_null($category->cat_img) ) {
            if (file_exists($category->cat_img)) {
                unlink($category->cat_img);
            }
        }

        $category->delete();

        return response()->json(['message' => 'Category has been deleted.'], 200);
    }
}
