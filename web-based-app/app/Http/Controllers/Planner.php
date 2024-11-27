<?php

namespace App\Http\Controllers;
use App\Models\Planner as Planners;
use Illuminate\Http\Request;

class Planner extends Controller
{
    //
    public function index()
    {
        return view('admin.planner');
    }
    public function delete($id)
    {
        $planner = Planners::find($id);
        $planner->delete();
        return redirect()->route('planner.table')->with('success', 'Planner deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $planner = Planners::find($id);
        $planner->title = $request->title;
        $planner->description = $request->description;
        $planner->planner_date = $request->planner_date;
        // $planner->user_id = $request->send_to;
        
        // if ($request->send_to === 'all') {
        //     $planner->user_id = null; // Use null or another field to indicate "all"
        // } else {
        //     $planner->user_id = $request->send_to; // Specific user ID
        // }
        $planner->save();
        return redirect()->route('planner.table')->with('success', 'Planner updated successfully.');
    }
}
