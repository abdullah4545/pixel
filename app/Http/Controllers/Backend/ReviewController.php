<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use DataTables;

class ReviewController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.review.index');
    }

    public function getData(Request $request)
    {
        $reviews = Review::all();

        // dd($categories);

        return DataTables::of($reviews)
             ->addIndexColumn()
             ->addColumn('review_img', function ($review) {
                return '<img src="'. asset($review->review_img) .'" alt="" style="width: 65px;">';
             })
             ->addColumn('name', function ($review) {
                return '<span class="badge bg-label-info">'. $review->name .'</span>';
             })
             ->addColumn('rating', function ($review) {
                return '<span class="badge rounded-pill bg-warning">'. $review->rating .'<i class="bx bxs-star" style="font-size: 12px; margin-left: 4px;"></i></span> ';
             })
             ->addColumn('status', function ($review) {
                if ($review->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="'.$review->id.'" data-status="'.$review->status.'">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="'.$review->id.'" data-status="'.$review->status.'">Deactive</span>';
                }
            })
            ->addColumn('action', function ($review) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $review->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $review->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['name', 'review_img', 'rating', 'status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $review = new Review();

        $review->name                = $request->name;
        $review->rating              = $request->rating;
        $review->description         = $request->description;
        $review->status              = $request->status;

        if( $request->file('review_img') ){
            $review_img = $request->file('review_img');

            $imageName          = microtime('.') . '.' . $review_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/review/';
            $review_img->move($imagePath, $imageName);

            $review->review_img   = $imagePath . $imageName;
        }

        $review->save();

        return response()->json(['message' => 'successfully Review Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminReviewStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Review::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = Review::find($id);
        return response()->json(['success' => $review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $review = Review::find($id);

        $review->name                = $request->name;
        $review->rating              = $request->rating;
        $review->description         = $request->description;
        $review->status              = $request->status;

        if( $request->file('review_img') ){
            $review_img = $request->file('review_img');

            if( !is_null($review->review_img) && file_exists($review->review_img) ){
                unlink($review->review_img);
             }

            $imageName          = microtime('.') . '.' . $review_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/review/';
            $review_img->move($imagePath, $imageName);

            $review->review_img   = $imagePath . $imageName;
        }

        $review->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if ( !is_null($review->review_img) ) {
            if (file_exists($review->review_img)) {
                unlink($review->review_img);
            }
        }

        $review->delete();

        return response()->json(['message' => 'Review has been deleted.'], 200);
    }
}
