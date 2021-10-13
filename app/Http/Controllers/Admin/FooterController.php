<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function onSelectAll()
    {
        $footer = Footer::all();
        return response()->json($footer);
    }

    public function AllFooterContent()
    {
        $footer = Footer::all();
        return view('backend.footer.all_footer', compact('footer'));
    } // end method

    public function EditFooterContent($id)
    {
        $footer = Footer::findOrFail($id);
        return view('backend.footer.edit_footer', compact('footer'));
    } // end method


    public function UpdateFooterContent(Request $request)
    {
        $footer_id = $request->id;

        Footer::findOrFail($footer_id)->update([

            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'footer_credit' => $request->footer_credit,

        ]);

        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.footer.content')->with($notification);
    } // end method
}