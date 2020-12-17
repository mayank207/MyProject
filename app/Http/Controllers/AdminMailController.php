<?php

namespace App\Http\Controllers;

use App\User;
use App\interviewer;
use App\Jobs\NewUser;
use App\Jobs\Adminjob;
use App\Mail\AdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminMailController extends Controller
{
    public function viewmail()
    {
        $candidates=Interviewer::get();
        $hrs=User::where('role','hr')->get();
        return view('management.index',compact('candidates','hrs'));
    }
    public function sendmail(Request $request)
    {
        if($request->role=="hr")
        {
            $user=User::where('role','hr')->get();
        }
        else if($request->role=="candidates")
        {
            $user=Interviewer::get();
        }
        else if($request->role=="singlehr"){
            $user=User::whereIn('id',$request->singlehr)->get();
        }
        else if($request->role=="singlecandidates"){
            $user=Interviewer::whereIn('id',[2])->get();
        }
        Adminjob::dispatch($user,$request->subject,$request->description)->delay(now()->addMinutes(1));
        return redirect()->route('admindashboard')->with('success','Email sent successfully');

    }
}