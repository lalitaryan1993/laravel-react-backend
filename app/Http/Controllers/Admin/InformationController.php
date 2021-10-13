<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function onSelectAll()
    {
        $information = Information::all();
        return response()->json($information);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllInformation()
    {
        $information = Information::all();
        return view('backend.information.all_information', compact('information'));
    }

    public function AddInformation()
    {
        return view('backend.information.add_information');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreInformation(Request $request)
    {

        Information::insert([
            'about' => $request->about,
            'refund' => $request->refund,
            'terms' => $request->terms,
            'privacy' => $request->privacy,

        ]);
        $notification = array(
            'message' => 'Information Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.information')->with($notification);
    } // end method



    public function EditInformation($id)
    {

        $information = Information::findOrFail($id);
        return view('backend.information.edit_information', compact('information'));
    } // end method


    public function UpdateInformation(Request $request, $id)
    {

        Information::findOrFail($id)->update([
            'about' => $request->about,
            'refund' => $request->refund,
            'terms' => $request->terms,
            'privacy' => $request->privacy,

        ]);
        $notification = array(
            'message' => 'Information Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.information')->with($notification);
    } // end method



    public function DeleteInformation($id)
    {

        Information::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Information Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method
}