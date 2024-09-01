<?php

namespace App\Http\Controllers;

use App\Models\Blogpage;
use Illuminate\Http\Request;
use DataTables;

class BlogpageController extends Controller
{
    public function index()
    {
        return view('backend.pages.blogpage.index');
    }

    public function projectedata(Request $request)
    {
        $blogpage = Blogpage::all();
        return Datatables::of($blogpage)
            ->addColumn('action', function ($service) {
                return '<a href="#" type="button" id="editProjectBtn" data-id="' . $service->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainProject" ><i class="bx bx-edit-alt"></i></a>
                <a href="#" type="button" id="deleteProjectBtn" data-id="' . $service->id . '" class="btn btn-danger btn-sm" ><i class="bx bx-trash"></i></a>';
            })

            ->make(true);
    }

    public function store(Request $request)
    {
        $blogpage = new Blogpage();
        $blogpage->title = $request->title;
        $blogpage->slug = $request->slug;
        $blogpage->short_description = $request->short_description;
        $blogpage->meta_title = $request->meta_title;
        $blogpage->meta_description = $request->meta_description;
        $blogpage->meta_keyword = $request->meta_keyword;
        $blogpage->description = $request->description;

        if ($request->image) {
            $blogpageImg = $request->file('image');
            $name = time() . "_" . $blogpageImg->getClientOriginalName();
            $uploadPath = ('public/images/packages/');
            $blogpageImg->move($uploadPath, $name);
            $blogpageImgUrl = $uploadPath . $name;
            $blogpage->image = $blogpageImgUrl;
        }
        if ($request->hasFile('postImage')) {
            foreach ($request->file('postImage') as $imgfiles) {
                $name = time() . "_" . $imgfiles->getClientOriginalName();
                $imgfiles->move(public_path() . '/images/blogpages/slider/');
                $imageData[] = $name;
            }
            $blogpage->postImage = json_encode($imageData);
        }

        $blogpage->save();

        return response()->json($blogpage, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogpage  $blogpage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogpage = Blogpage::findOrfail($id);
        return response()->json($blogpage, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogpage  $blogpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $blogpage = Blogpage::find($id);
        $blogpage->title = $request->title;
        $blogpage->slug = $request->slug;
        $blogpage->short_description = $request->short_description;
        $blogpage->meta_title = $request->meta_title;
        $blogpage->meta_description = $request->meta_description;
        $blogpage->meta_keyword = $request->meta_keyword;
        $blogpage->description = $request->description;

        if ($request->image) {
            $blogpageImg = $request->file('image');
            $name = time() . "_" . $blogpageImg->getClientOriginalName();
            $uploadPath = ('public/images/blogpage/');
            $blogpageImg->move($uploadPath, $name);
            $blogpageImgUrl = $uploadPath . $name;
            $blogpage->image = $blogpageImgUrl;
        }
        if ($request->hasFile('postImage')) {
            foreach ($request->file('postImage') as $imgfiles) {
                $name = time() . "_" . $imgfiles->getClientOriginalName();
                $imgfiles->move(public_path() . '/images/blogpages/slider/', $name);
                $imageData[] = $name;
            }
            $blogpage->postImage = json_encode($imageData);
        }

        $blogpage->update();
        return response()->json($blogpage, 200);
    }

    public function updatestatus(Request $request)
    {
        $blogpage = Blogpage::Where('id', $request->blogpage_id)->first();
        $blogpage->status = $request->status;
        $blogpage->save();

        return response()->json($blogpage, 200);
    }

    public function destroy(string $id)
    {
        $blogpage = Blogpage::find($id);
        $blogpage->delete();

        return response()->json('success', 200);
    }
}
