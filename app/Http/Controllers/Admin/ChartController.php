<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function onAllSelect()
    {
        $charts = Chart::all();
        return $charts;
    }

    public function AllChartContent()
    {
        $chart = Chart::all();
        return view('backend.chart.all_chart', compact('chart'));
    } // end method

    public function AddChartContent()
    {
        return view('backend.chart.add_chart');
    }

    public function StoreChartContent(Request $request)
    {

        $request->validate([
            'Technology' => 'required',
            'Projects' => 'required',
        ]);



        Chart::insert([
            'Technology' => $request->Technology,
            'Projects' => $request->Projects,

        ]);

        $notification = array(
            'message' => 'Chart Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.chart.content')->with($notification);
    } // end method


    public function EditChartContent($id)
    {
        $chart = Chart::findOrFail($id);
        return view('backend.chart.edit_chart', compact('chart'));
    } // end method


    public function UpdateChartContent(Request $request)
    {

        $chart_id = $request->id;

        Chart::findOrFail($chart_id)->update([

            'Technology' => $request->Technology,
            'Projects' => $request->Projects,


        ]);

        $notification = array(
            'message' => 'Chart Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.chart.content')->with($notification);
    } // end method

    public function DeleteChart($id)
    {

        Chart::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Chart Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method
}