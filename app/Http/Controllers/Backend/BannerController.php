<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.banner.index');
    }

    public function getData(Request $request)
    {
        $banners = Banner::all();

        // dd($categories);

        return DataTables::of($banners)
            ->addIndexColumn()
            ->addColumn('banner_img', function ($banner) {
                return '<img src="' . asset($banner->banner_img) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($banner) {
                if ($banner->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="' . $banner->id . '" data-status="' . $banner->status . '">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="' . $banner->id . '" data-status="' . $banner->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($banner) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $banner->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $banner->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['banner_img', 'status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->title         = $request->title;
        $banner->text          = $request->text;
        $banner->small_title         = $request->small_title;
        $banner->button_name         = $request->button_name;
        $banner->button_link         = $request->button_link;
        $banner->status        = $request->status;

        if ($request->file('banner_img')) {
            $banner_img = $request->file('banner_img');
            $imageName          = microtime('.') . '.' . $banner_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/banner/';
            $banner_img->move($imagePath, $imageName);
            $banner->banner_img   = $imagePath . $imageName;
        }

        if ($request->file('banner_img_after')) {
            $banner_imga = $request->file('banner_img_after');
            $imageNamea          = microtime('.') . '.' . $banner_imga->getClientOriginalExtension();
            $imagePatha          = 'public/backend/image/banner/';
            $banner_imga->move($imagePatha, $imageNamea);
            $banner->banner_img_after   = $imagePatha . $imageNamea;
        }

        $banner->save();

        return response()->json(['message' => 'successfully Banner Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminBannerStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Banner::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return response()->json(['success' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);

        $banner->title         = $request->title;
        $banner->text         = $request->text;
        $banner->small_title         = $request->small_title;
        $banner->button_name         = $request->button_name;
        $banner->button_link         = $request->button_link;
        $banner->status        = $request->status;

        if ($request->file('banner_img')) {
            $banner_img = $request->file('banner_img');
            if (!is_null($banner->banner_img) && file_exists($banner->banner_img)) {
                unlink($banner->banner_img);
            }
            $imageName          = microtime('.') . '.' . $banner_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/banner/';
            $banner_img->move($imagePath, $imageName);
            $banner->banner_img   = $imagePath . $imageName;
        }

        if ($request->file('banner_img_after')) {
            if (!is_null($banner->banner_img_after) && file_exists($banner->banner_img_after)) {
                unlink($banner->banner_img_after);
            }
            $banner_imga = $request->file('banner_img_after');
            $imageNamea          = microtime('.') . '.' . $banner_imga->getClientOriginalExtension();
            $imagePatha          = 'public/backend/image/banner/';
            $banner_imga->move($imagePatha, $imageNamea);
            $banner->banner_img_after   = $imagePatha . $imageNamea;
        }

        $banner->save();

        return response()->json(['message' => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);

        if (!is_null($banner->banner_img)) {
            if (file_exists($banner->banner_img)) {
                unlink($banner->banner_img);
            }
        }

        $banner->delete();

        return response()->json(['message' => 'Banner has been deleted.'], 200);
    }
}
