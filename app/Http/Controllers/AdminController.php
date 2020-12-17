<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\technology;
use App\interviewer;
use App\Mail\RegisterUserMail;
use Illuminate\Support\Facades\Mail;
use App\DataTables\CategoryDataTable;
use Illuminate\Support\Facades\Hash;
use App\Jobs\NewUserRegisterEmail;
use App\Jobs\MailSend;
use App\Jobs;
use Exception;




class AdminController extends Controller
{


  public function CreateHr(Request $request)
    {
     
            $this->validate($request,
            [
            	"name"=>"required",
                "email"=>"required",
                "mobilenumber"=>"required",
                "education"=>"required",
                "expirence"=>"required",
                "currentsalary"=>"required",
                "password"=>"required",
    	 
             ]);

             $hr=New user();
           
             $hr->name=$request->name;
             $hr->email=$request->email;
             $hr->mobile=$request->mobilenumber;
             $hr->education=$request->education;
             $hr->expirence=$request->expirence;
             $hr->salary=$request->currentsalary;
             $hr->role='HR';
             $hr->password =Hash::make($request->password);

             // dispatch(new Jobs($hr));
        // Mail::to('mayank82000@gmail.com')->send(new MailSend('abc'));
          Mail::to($hr)->send(new RegisterUserMail());
        // NewUserRegisterEmail::dispatch($hr);  
        $hr->save();
      return redirect()->route('admindashboard')->with('HR','HR Created Successfully');
    }


  public function AddNewInter()
    {
      try {
            $tech=technology::get();
     
          }
      catch(Exception $exception)
          {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
          }
      return view('admin.AddInterviewer',['tech'=>$tech]);
    }


  public function admindashboard()
    {
      try{
            $hr=user::orderBy('id','desc')->where('role','HR')->take(5)->get();
            $interviewer = interviewer::orderBy('id','desc')->take(5)->get();

            $hr1=user::where('role','HR')->count();
            $tech=technology::count();
            $inter=interviewer::count();
        // dd();
         }
      catch(Exception $exception)
         {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
         }
      return view('admin.admindashboard',['hr'=>$hr,'interviewer'=>$interviewer,'hr1'=>$hr1,'tech'=>$tech,'inter'=>$inter]);
    }


  public function hredit($id)
    {
      try{
            $hr=user::where('id',$id)->get();
          }
      catch(Exception $exception)
         {
             throw new \App\Exceptions\NotFoundException('Something Went wrong');
          }
     
      return view('admin.hredit',['hr'=>$hr]);
    }

 public function HREDIT1(Request $request,$id)
    {
      try{
           $this->validate($request,
            [
              "name"=>"required",
                "mobilenumber"=>"required",
                "education"=>"required",
                "expirence"=>"required",
                "currentsalary"=>"required",
               ]);
     

               user::where('id', $id)
              ->update([
                  
                  'name' => $request->name,
                  'mobile' => $request->mobilenumber,
                  'education' => $request->education,
                  'expirence' => $request->expirence,
                  'salary' => $request->currentsalary,
                   
                ]);
          }

      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
        } 
       
      return redirect()->route('HrList');
    }



  public function HrList()
    {
      try{
           $hr = user::where('role','HR')->paginate(4);
          }
      catch(Exception $exception)
         {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
         }       
    
      return view('admin.HrList',['hr'=>$hr]);
    }
    



  public function AddTech(Request $request)
     {
      try{
            $this->validate($request,
            [
              "technology"=>"required",

             ]);
             $tech=New technology();
             $tech->technology=$request->technology;
             $tech->hr_id=(auth()->user()->id);
             $tech->save();
           }
      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
        } 
     
      return redirect()->route('admindashboard')->with('TECH','Technology Created Successfully');
}


  public function Tech(CategoryDataTable $datatable)
    {
        return $datatable->render('admin.AddTechnology');
      
    }


  public function AddInterviewer(Request $request)
    {
      
        // dd('mayank');
            $this->validate($request,
            [
              "name"=>"required|string",
                "email"=>"required",
                "mobilenumber"=>"required|min:10|max:10",
                "othernumber"=>"required|min:10|max:10",
                "technology"=>"required",
                "expirence"=>"required|integer|min:0",
                "currentsalary"=>"required|integer|min:0",
                "expected"=>"required|integer|min:0",
                "education"=>"required|string",
                "practicalremark"=>"required|integer|min:0",
                "technicalremark"=>"required|integer|min:0",
                "generelremark"=>"required|integer|min:0",
                ]);
            try{
                 $interviewer=new interviewer();
                 $interviewer->name=$request->name;
                 $interviewer->email=$request->email;
                 $interviewer->mobile=$request->mobilenumber;
                 $interviewer->exmobile=$request->othernumber;
                 $interviewer->technology=$request->technology;
                 $interviewer->expirence=$request->expirence;
                 $interviewer->currentsalary=$request->currentsalary;
                 $interviewer->expectedsalary=$request->expected;
                 $interviewer->education=$request->education;
                 $interviewer->practical=$request->practicalremark;
                 $interviewer->technical=$request->technicalremark;
                 $interviewer->general=$request->generelremark;
                 $interviewer->hr_id=(auth()->user()->id);
                 $interviewer->save();
            }
      catch(Exception $exception)
            {
              throw new \App\Exceptions\NotFoundException('Something Went wrong');
            } 

       return redirect()->route('admindashboard')->with('Interviewer','Interviewer Created Successfully');
    }

 public function CandidateEdit(Request $request,$id)
    {
        try{
             $this->validate($request,
              [
                "name"=>"required",
                  "email"=>"required",
                  "mobilenumber"=>"required|min:10|max:10",
                  "othernumber"=>"required|min:10|max:10",
                  "expirence"=>"required",
                  "currentsalary"=>"required",
                  "expected"=>"required",
                  "education"=>"required",
                  "practicalremark"=>"required",
                  "technicalremark"=>"required",
                  "generelremark"=>"required",
                  ]);

                 interviewer::where('id', $id)
                ->update([
                    
                    'name' => $request->name,
                    'mobile' => $request->mobilenumber,
                    'exmobile' => $request->othernumber,
                    'expirence' => $request->expirence,
                    'CurrentSalary' => $request->currentsalary,
                     'expectedsalary' => $request->expected,
                    'education' => $request->education,
                     'practical' => $request->practicalremark,
                     'technical' => $request->technicalremark,
                     'general' => $request->generelremark,
                     'hr_id'=>(auth()->user()->id)
                  ]);
              }
          catch(Exception $exception)
              {
                  throw new \App\Exceptions\NotFoundException('Something Went wrong');

              }

       return redirect()->route('Candidate');
    }     


  public function CandidateEditList($id)
    {
          try{
    
               $interviewer = interviewer::where('id',$id)->get();
               $technology = technology::with('tech')->get();
             }
           catch(Exception $exception)
            {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
            }

      return view('admin.CandidateEdit',['inter'=>$interviewer,'tech'=>$technology]);
    }



public function Candidate(Request $request)
    {
      if($request->ajax())
        {
           if($request->category)
            {

                if(!empty($request->from_date))
                {
                  
                    $category=$request->category;
                    $interviewDetails=Interviewer::with('gettechnology','inter')->whereHas('gettechnology',function($q) use($category){
                        $q->where('id','=',$category);
                    })->whereBetween('created_at', array($request->from_date, $request->to_date))->get();

                }
                else
                {
                 
                    $category=$request->category;
                    $interviewDetails=Interviewer::with('gettechnology','inter')->whereHas('gettechnology',function($q) use($category){
                        $q->where('id','=',$category);
                    })->get();

                }
            }


            else
            { 
                if(!empty($request->from_date))
                {
                  
                    $interviewDetails=Interviewer::with('gettechnology','inter')->whereBetween('created_at', array($request->from_date, $request->to_date))->get();

                }

                else

                {
                  
                    $interviewDetails=Interviewer::with('gettechnology','inter')->get();
               
                }
            }

            return datatables()->of($interviewDetails)->addIndexColumn()
            ->editColumn('technology',function($interviewDetails){
                return $interviewDetails->gettechnology->technology;
            })
            ->addColumn('action', function($row){

                    $btn ='created By &nbsp;&nbsp'.  $row->inter->name ;


                      $btn = $btn.'<br><a href="'.route('DeleteInter',$row->id).'" 
                       class="edit mr-3"><i class="fa fa-trash"></i></a></div>&nbsp;&nbsp;';

                      $btn = $btn.'&nbsp;&nbsp;<a href="'.route('CandidateEditList',$row->id).'" class="edit mr-3"><i class="fa fa-edit"></i></a></div>';

                return $btn;
            })->rawColumns(['action','technology'])->make(true);
        }
        $technology = technology::get();
         
         // $interviewer = interviewer::get();
         // $technology = technology::with('tech')->get();

      return view('admin.CandidateList',['tech'=>$technology]);
    }




public function DeleteTech($id){
        try{
            technology::find($id)->delete();
            }
        catch(Exception $exception)
            {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
            }

         return back()->with('warning','Deleted  Successfully');
    }


       
   public function DeleteHr($id){
      try{
            user::find($id)->delete();
         }
      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
        } 
        
      return back()->with('warning','Deleted Successfully');
    }
       

  public function DeleteInter($id){
        try{
            Interviewer::find($id)->delete();
           }
      catch(Exception $exception)
          {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
           }     
      return back()->with('warning','Deleted Successfully');
    }




}


