<?php

namespace App\Http\Controllers;
use App\Interviewer;
use App\technology;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	 // public function hredit($id){
    public function searchname(Request $request){
       $details=Interviewer::where('name','LIKE','%'.$request->candidate_name.'%')->where('hr_id','=',auth()->user()->id)->get();
        // dd($details);
        return view('admin.result',['details'=>$details]);
    }

    
    public function search(){
        try{
        $tech=technology::get();
                   }
      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');

        } 
        return view('admin.search',['tech'=>$tech]);
    }

        
        
    
    public function searchdate(Request $request)
    {

        $this->validate($request,
        [
            "fromdate"=>"required|date",
            "todate"=>"required|date"

        ]);
        $startDate=$request->fromdate;
        $toDate=$request->todate;

        $details=Interviewer::where('hr_id',auth()->user()->id)->whereBetween('created_at',[$startDate.' 00:00:00',$toDate.' 23:59:59'])->get();

        
        return view('admin.result',compact('details'));
    }

    public function tech(Request $request){
        $details=Interviewer::where('technology','LIKE','%'.$request->technology.'%')->where('hr_id','=',auth()->user()->id)->get();
        // dd($details);
        return view('admin.result',['details'=>$details]);

    }




  public function Tech1()
      {
         try{
            $(document).ready(function() {
             $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                     ]
             } );
        } );
             }
         catch(Exception $exception)
            {
              throw new \App\Exceptions\NotFoundException('Something Went wrong');
            }

        return view('hr.ex');
      }
        
}
