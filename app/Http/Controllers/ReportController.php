<?php

namespace App\Http\Controllers;
use App\interviewer;
use App\user;
use App\technology;
use Illuminate\Http\Request;

class ReportController extends Controller
{

//hr report
 	public function hrreport(){
 		
 		$hrs=user::paginate(5);
        return view('admin.hrreport',['hrs'=> $hrs]);
 		
 	}

 	 public function searchname(Request $request){

 	 	if($request=='null')
 	 	{
 	 		$hrs=user::paginate(5);
        	return view('admin.hrreport',['hrs'=> $hrs]);
 	 	}
 	 	else{
      	$hrs=user::where('role','HR')->where('name','LIKE','%'.$request->candidate_name.'%')->paginate(5);
        return view('admin.hrreport',['hrs'=> $hrs]);
        }
    }


//candidate report
 	public function candidatereport(){
 		$user=interviewer::paginate(5);
 		return view('admin.candidatereport',['candidate'=>$user]);
 	}


 	    public function searchdate(Request $request)
    {

        $this->validate($request,
        [
            "startdate"=>"required|date",
            "enddate"=>"required|date"

        ]);

        // dd($request);
        $startDate=$request->startdate;
        $toDate=$request->enddate;

        $candidate=interviewer::whereBetween('created_at',[$startDate.' 00:00:00',$toDate.' 23:59:59'])->paginate(5);

        
        return view('admin.candidatereport',compact('candidate'));
    }

}
