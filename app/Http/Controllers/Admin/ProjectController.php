<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Image;


class ProjectController extends Controller
{

    public function OnSelectThree()
    {
        $projects = Projects::limit(3)->get();
        return response()->json($projects);
    }


    public function OnSelectAll()
    {
        $projects = Projects::all();
        return response()->json($projects);
    }

    public function projectDetails($projectId)
    {

        $project = Projects::find($projectId);
        return response()->json($project);
    }

    public function AllProject()
    {
        $projects = Projects::all();
        return view('backend.project.all_project', compact('projects'));
    } // end method

    public function AddProject()
    {
        return view('backend.project.add_project');
    } // end method


    public function StoreProject(Request $request)
    {

        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',
        ], [
            'project_name.required' => 'Input Project Name',
            'project_description.required' => 'Input Project Description',

        ]);

        $image_one = $request->file('img_one');
        $name_gen = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(626, 417)->save('upload/project/' . $name_gen);
        $save_url_one = 'http://127.0.0.1:8000/upload/project/' . $name_gen;


        $image_two = $request->file('img_two');
        $name_gen = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(540, 607)->save('upload/project/' . $name_gen);
        $save_url_two = 'http://127.0.0.1:8000/upload/project/' . $name_gen;

        Projects::insert([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.projects')->with($notification);
    } // end method

    public function EditProject($id)
    {

        $project = Projects::findOrFail($id);
        return view('backend.project.edit_project', compact('project'));
    } // end method


    public function UpdateProject(Request $request)
    {

        $project_id = $request->id;

        if ($request->file('img_one')) {

            $image_one = $request->file('img_one');
            $name_gen = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(626, 417)->save('upload/project/' . $name_gen);
            $save_url_one = 'http://127.0.0.1:8000/upload/project/' . $name_gen;


            $image_two = $request->file('img_two');
            $name_gen = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(540, 607)->save('upload/project/' . $name_gen);
            $save_url_two = 'http://127.0.0.1:8000/upload/project/' . $name_gen;

            Projects::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url_one,
                'img_two' => $save_url_two,
            ]);

            $notification = array(
                'message' => 'Project Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.projects')->with($notification);
        } else {

            Projects::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,

            ]);

            $notification = array(
                'message' => 'Project Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.projects')->with($notification);
        }
    } // end method

    public function DeleteProject($id)
    {

        Projects::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Project Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method


}