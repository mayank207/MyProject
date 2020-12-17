<?php

namespace App\Http\Controllers;
use App\interviewer;
use App\technology;
use App\user;
use Illuminate\Http\Request;

class HrController extends Controller
{
        public function AddInter(Request $request)
       {
          try{
              $this->validate($request,
              [
               "name"=>"required|string|min:3|max:25",
                "email"=>"required",
                "mobilenumber"=>"required|min:10|max:12",
                "othernumber"=>"required",
                "technology"=>"required",
                "expirence"=>"required",
                "currentsalary"=>"required",
                "expected"=>"required",
                "education"=>"required",
                "practicalremark"=>"required",
                "technicalremark"=>"required",
                "generelremark"=>"required",
                ]);

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

        return redirect()->route('hrdashboard')->with('Interviewer','Interviewer Created Successfully');
      }


    public function intersedit($id)
      {
          try{
                $candidate = interviewer::where('id',$id)->get();
                $technology = technology::get();
             }
          catch(Exception $exception)
            {
                throw new \App\Exceptions\NotFoundException('Something Went wrong');
             } 
         return view('hr.candidateedit',['tech'=>$technology,'candidate'=>$candidate]);
        
       }

   
  public function interEdit(Request $request,$id)
    {
      try{
             $this->validate($request,
              [
                "name"=>"required|string|max:25|min:4",
                  "mobilenumber"=>"required|max:12|min:10",
                  "othernumber"=>"required|max:12|min:10",
                  "expirence"=>"required|max:2|min:1",
                  "currentsalary"=>"required|max:5|min:2",
                  "expected"=>"required|max:5|min:2",
                  "education"=>"required|string|max:10",
                  "practicalremark"=>"required|min:1|max:2",
                  "technicalremark"=>"required|min:1|max:2",
                  "generelremark"=>"required|min:1|max:2",
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

       return redirect()->route('hrdashboard');

    }
        
    public function CandidateList(Request $request)
        {
          try{
               if($request->ajax())
                  {
                    $query=interviewer::with('gettechnology')->where('hr_id',auth()->user()->id)->get();
                     return datatables()->of($query)->addIndexColumn()

                     ->editColumn('technology',function($query){
                      return $query->gettechnology->technology;
                      })

                      ->addColumn('action', function($row)

                      {

                      // $btn = '<button class="deleteCandidate" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button></div>';

                        $btn = '<a href="'.route('intersedit',$row->id).'" 
                       class="deleteCandidate"><i class="fa fa-edit"></i></a></div>&nbsp;&nbsp;';

                       $btn = $btn.'&nbsp;&nbsp;<a href="'.route('DelInter',$row->id).'" 
                       class="edit mr-3"><i class="fa fa-trash"></i></a></div>';

                      return $btn;
                      })->rawColumns(['action','technology'])
                      ->make(true);
                  }

              $interviewer = interviewer::where('hr_id',auth()->user()->id)->get();
              
            }
          catch(Exception $exception)
            {
              throw new \App\Exceptions\NotFoundException('Something Went wrong');
            }

          return view('hr.CandidateList',['interviewer'=>$interviewer]);
      }

  public function AdInt()
      {
        try{
              $technology = technology::get();
            }
        catch(Exception $exception)
            {
              throw new \App\Exceptions\NotFoundException('Something Went wrong');
            } 

        return view('hr.AddCandidate',['tech'=>$technology]);
      }

  public function AddTechno(Request $request)
      {
        try{
                $this->validate($request,
                [
                  "technology"=>"required",

                 ]);
               
                 $tech=New  technology();
                 $tech->technology=$request->technology;
                 $tech->hr_id=(auth()->user()->id);
                 $tech->save();
            }
        catch(Exception $exception)
            {
               throw new \App\Exceptions\NotFoundException('Something Went wrong');
            } 
         
         return redirect()->route('TechnoList')->with('TECH','Technology Created Successfully');
      }

  public function TechnoList()
      {
         try{
              $technology = technology::paginate(4);
             }
         catch(Exception $exception)
            {
              throw new \App\Exceptions\NotFoundException('Something Went wrong');
            }

        return view('hr.AddTechnology',['tech'=>$technology]);
      }

  public function DelTech($id)
  {
     try{
          technology::find($id)->delete();
         }
      catch(Exception $exception)
         {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
          } 
      
      return back()->with('warning','Deleted  Successfully');
    }


  public function DelHr($id)
  {
    try{
         user::find($id)->delete();
       }
    catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
        }

    return back()->with('warning','Deleted Successfully');
   }

        

    public function DelInter($id)
    {
    try{
          Interviewer::find($id)->delete();
       }
    catch(Exception $exception)
      {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
       } 
    return back()->with('warning','Deleted Successfully');
    
    }

    public function hrdashboard()
    {
      try{
          $interviewer = interviewer::with('inter')->orderBy('id','desc')->where('hr_id',auth()->user()->id)->take(5)->get();
          $tech=technology::count();
          $candi=interviewer::count();
          // dd($interviewer);
          }
      
      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
         } 

        $i=0;
      return view('hr.hrdashboard',['interviewer'=>$interviewer,'inter'=>$interviewer,'tech'=>$tech,'candi'=>$candi]);
    }

 
  public function AllInterviewer(Request $request)
  {
      try{
          if($request->ajax())
            {
               $query=interviewer::with('gettechnology')->get();
                return datatables()->of($query)->addIndexColumn()
                    
                     ->editColumn('technology',function($query){
                      return $query->gettechnology->technology;
                      })->rawColumns(['technology'])

                ->make(true);
            }
            
            $interviewer = interviewer::paginate(5);
             }
      catch(Exception $exception)
            {
             throw new \App\Exceptions\NotFoundException('Something Went wrong');
            } 
            
      return view('hr.AllInterviewer',['interviewer'=>$interviewer]);
    }


      public function candidets(Request $request)
      {
        

        if($request->value == "my-candidate")
        {
          return redirect()->route('CandidateList');
        }

       if($request->value == "all-candidate")
        {
           return redirect()->route('AllInterviewer');
        }
        else{
          return redirect()->back();
        }

      }
}
