<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;


class DisplayAccountRegistered extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $roleFilter;
  
    public function render(){
        $query = User::with('students')->where('id', '!=', Auth::id());
        if ($this->search) {
            $query = User::where('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%');
            if ($query->count() == 0) {
                session()->flash('error', 'No results found. Please enter again.');
            }
        }
        if ($this->roleFilter) {
           switch($this->roleFilter){
             
               case 'teacher':
                   $query = User::where('role', 'teacher');
                   break;
               case 'parent':
                   $query = User::where('role', 'parent');
                   break;
                default:
                break;
           }
        }
        $account = $query->paginate(10);    



        return view('livewire.display-account-registered', ['accounts' => $account]);
    }
   public function delete($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'Account has been deleted successfully');
    }
    
}
