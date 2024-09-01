<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;
use DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('backend.pages.service.project-section');
    }


    public function get_all_project_service()
    {
        // dd($id);
        $projects = Project::all();

        return DataTables::of($projects)
            ->addIndexColumn()
            ->addColumn('service-name', function ($project) {
                $service = Service::where('id', $project->service_id)->first();
                if (isset($service)) {
                    return $service->title;
                } else {
                    return 'Service Deleted';
                }
            })
            ->addColumn('project_img', function ($project) {
                return '<img src="' . asset($project->project_img) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('name', function ($project) {
                return '<span class="badge bg-label-info">' . $project->name . '</span>';
            })
            ->addColumn('url', function ($project) {
                if (!is_null($project->url)) {
                    return '<span class="badge rounded-pill bg-label-primary">' . $project->url . '</span>';
                } else {
                    return '<span class="badge rounded-pill bg-label-danger">N/A</span>';
                }
            })
            ->addColumn('status', function ($project) {
                if ($project->status == 1) {
                    return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="' . $project->id . '" data-status="' . $project->status . '">Active</span>';
                } else {
                    return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="' . $project->id . '" data-status="' . $project->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($project) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $project->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $project->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['name', 'url', 'project_img', 'service-name', 'status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name                = $request->name;
        $project->url                 = $request->url;
        $project->service_id          = $request->service_id;
        $project->status              = $request->status;
        if ($request->file('project_img')) {
            $project_img = $request->file('project_img');

            $imageName          = microtime('.') . '.' . $project_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/project/';
            $project_img->move($imagePath, $imageName);

            $project->project_img   = $imagePath . $imageName;
        }

        $project->save();

        return response()->json(['message' => 'successfully Project Created', 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     */
    public function adminProjectStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Project::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return response()->json(['success' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->name                = $request->name;
        $project->url                 = $request->url;
        $project->service_id          = $request->service_id;
        $project->status              = $request->status;

        if ($request->file('project_img')) {
            $project_img = $request->file('project_img');


            if (!is_null($project->project_img) && file_exists($project->project_img)) {
                unlink($project->project_img);
            }

            $imageName          = microtime('.') . '.' . $project_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/project/';
            $project_img->move($imagePath, $imageName);

            $project->project_img   = $imagePath . $imageName;
        }

        $project->update();

        return response()->json(['message' => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if (!is_null($project->project_img)) {
            if (file_exists($project->project_img)) {
                unlink($project->project_img);
            }
        }

        $project->delete();

        return response()->json(['message' => 'Project has been deleted.'], 200);
    }
}
