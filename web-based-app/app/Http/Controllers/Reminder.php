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
        return redirect()->route('reminder.table')->with('success', 'Reminder deleted successfully.');
    }
}
