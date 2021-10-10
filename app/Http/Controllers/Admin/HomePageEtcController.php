<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageEtc;
use Illuminate\Http\Request;

class HomePageEtcController extends Controller
{
    public function SelectVideo()
    {

        $result = HomePageEtc::select('video_description', 'video_url')->get();
        return $result;
    }


    public function SelectTotalHome()
    {
        $result = HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
        return $result;
    }

    public function SelectTechHome()
    {
        $result = HomePageEtc::select('tech_description')->get();
        return $result;
    }

    public function SelectHomeTitle()
    {
        $result = HomePageEtc::select('home_title', 'home_subtitle')->get();
        return $result;
    }

    // public function SelectHomeTitle()
    // {
    //     $result = HomePageEtc::select('home_title', 'home_subtitle')->get();
    //     return $result;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}