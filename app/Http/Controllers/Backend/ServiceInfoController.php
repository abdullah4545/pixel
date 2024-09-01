<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceInfo;
use App\Models\Service;
use DataTables;

class ServiceInfoController extends Controller
{
    public function index_service_info(string $id)
    {
        return view('backend.pages.service.service-info', compact('id'));
    }


    public function get_all_service_info(string $id)
    {
        // dd($id);
        $serviceInfos = ServiceInfo::where('service_id', $id)->get();

        return DataTables::of($serviceInfos)
                ->addIndexColumn()
                ->addColumn('service-name', function ($serviceInfo){
                    return Service::where('id', $serviceInfo->service_id)->first()->title;
                })
                ->addColumn('service_info_img', function ($serviceInfo) {
                    return '<img src="'. asset($serviceInfo->img) .'" alt="" style="width: 65px;">';
                })
                ->addColumn('type', function ( $serviceInfo ) {
                    return '<span class="badge bg-label-info">'. $serviceInfo->type .'</span>';
                })
                ->addColumn('status', function ($serviceInfo) {
                    if ($serviceInfo->status == 1) {
                        return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="'.$serviceInfo->id.'" data-status="'.$serviceInfo->status.'">Active</span>';
                    } else {
                        return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="'.$serviceInfo->id.'" data-status="'.$serviceInfo->status.'">Deactive</span>';
                    }
            })
            ->addColumn('action', function ($serviceInfo) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $serviceInfo->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $serviceInfo->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['type', 'service_info_img', 'service-name', 'status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $serviceInfo = new ServiceInfo();

        $serviceInfo->service_id          = $request->service_id;
        $serviceInfo->title               = $request->title;
        $serviceInfo->small_desc          = $request->small_desc;
        $serviceInfo->type                = $request->type;
        $serviceInfo->status              = $request->status;

        if( $request->file('img') ){
            $img = $request->file('img');

            $imageName          = microtime('.') . '.' . $img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service-info/';
            $img->move($imagePath, $imageName);

            $serviceInfo->img   = $imagePath . $imageName;
        }

        $serviceInfo->save();

        return response()->json(['message' => 'successfully Service Info Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminServiceInfoStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = ServiceInfo::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceInfo = ServiceInfo::find($id);
        return response()->json(['success' => $serviceInfo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $serviceInfo = ServiceInfo::find($id);

        $serviceInfo->service_id          = $request->service_id;
        $serviceInfo->title               = $request->title;
        $serviceInfo->small_desc          = $request->small_desc;
        $serviceInfo->type                = $request->type;
        $serviceInfo->status              = $request->status;

        if( $request->file('img') ){
            $img = $request->file('img');

            if( !is_null($serviceInfo->img) && file_exists($serviceInfo->img) ){
                unlink($serviceInfo->img);
             }

            $imageName          = microtime('.') . '.' . $img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service-info/';
            $img->move($imagePath, $imageName);

            $serviceInfo->img   = $imagePath . $imageName;
        }

        $serviceInfo->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceInfo = ServiceInfo::find($id);

        if ( !is_null($serviceInfo->img) ) {
            if (file_exists($serviceInfo->img)) {
                unlink($serviceInfo->img);
            }
        }

        $serviceInfo->delete();

        return response()->json(['message' => 'Service Info has been deleted.'], 200);
    }
}
