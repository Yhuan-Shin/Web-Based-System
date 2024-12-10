<?php

namespace App\Http\Controllers;
use App\Models\Reminder as Reminders;
use Illuminate\Http\Request;

class Reminder extends Controller
{
    //
    public function index(){
        return view('admin.reminder');
    }
    public function delete($id){
        Reminders::destroy($id);
        return redirect()->route('reminder.index')->with('success', 'Reminder deleted successfully.');
    }
    public function update(Request $request, $id){
        $reminder = Reminders::find($id);
        $reminder->title = $request->title;
        $reminder->description = $request->description;
        $reminder->user_id = $request->send_to;
        if($request->send_to === 'all'){
            $reminder->user_id = null;
        }else{
            $reminder->user_id = $request->send_to;
        }
        
        $reminder->save();
        return redirect()->route('reminder.index')->with('success', 'Reminder updated successfully.');
    }
}
