<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use DataTables;

class LogoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.logo.index');
    }

    public function getData(Request $request)
    {
        $logos = Logo::all();

        // dd($categories);

        return DataTables::of($logos)
             ->addIndexColumn()
             ->addColumn('logo_img', function ($logo) {
                return '<img src="'. asset($logo->logo_img) .'" alt="" style="width: 65px;">';
             })
             ->addColumn('url', function ($logo) {
                if( !is_null($logo->url) ){
                    return '<span class="badge rounded-pill bg-label-primary">'. $logo->url .'</span>';
                }
                else{
                    return '<span class="badge rounded-pill bg-label-danger">N/A</span>';
                }
             })
             ->addColumn('status', function ($logo) {
                if ($logo->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="'.$logo->id.'" data-status="'.$logo->status.'">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="'.$logo->id.'" data-status="'.$logo->status.'">Deactive</span>';
                }
            })
            ->addColumn('action', function ($logo) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $logo->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $logo->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['logo_img', 'url', 'status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $logo = new Logo();

        $logo->url         = $request->url;
        $logo->status      = $request->status;

        if( $request->file('logo_img') ){
            $logo_img = $request->file('logo_img');

            $imageName          = microtime('.') . '.' . $logo_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/logo/';
            $logo_img->move($imagePath, $imageName);

            $logo->logo_img   = $imagePath . $imageName;
        }

        $logo->save();

        return response()->json(['message' => 'successfully Logo Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminLogoStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Logo::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logo = Logo::find($id);
        return response()->json(['success' => $logo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $logo = Logo::find($id);

        $logo->url         = $request->url;
        $logo->status      = $request->status;

        if( $request->file('logo_img') ){
            $logo_img = $request->file('logo_img');

            if( !is_null($logo->logo_img) && file_exists($logo->logo_img) ){
                unlink($logo->logo_img);
             }

            $imageName          = microtime('.') . '.' . $logo_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/logo/';
            $logo_img->move($imagePath, $imageName);

            $logo->logo_img   = $imagePath . $imageName;
        }

        $logo->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logo = Logo::find($id);

        if ( !is_null($logo->logo_img) ) {
            if (file_exists($logo->logo_img)) {
                unlink($logo->logo_img);
            }
        }

        $logo->delete();

        return response()->json(['message' => 'Logo has been deleted.'], 200);
    }
}
