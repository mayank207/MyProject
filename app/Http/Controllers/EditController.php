<?php

namespace App\Http\Controllers;
use App\user;
use App\technology;
use App\interviewer;
use App\DataTables\InterviewerDataTable;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $datatable)
    {
        
        return $datatable->render('admin.CandidateList');
  
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
      
       if($request->ajax())
        {
            
         $query=user::where('role','HR')->get();
            
            return datatables()->of($query)->addIndexColumn()
            
            ->addColumn('action', function($row){

            
            $btn = '<a href="'.route('DeleteHr',$row->id).'" 
            class="delete mr-3"><i class="fa fa-trash"></i></a></div>';

              $btn = $btn.'&nbsp; &nbsp; <a href="'.route('Edit.edit',$row->id).'" 
            class="edit mr-3"  ><i class="fa fa-edit"></i></a></div>';
            

        

                // $btn = $btn.'        <a href="'.route('hredit',$row->id).'" class="edit mr-3"><i class="fa fa-edit"></i></a></div>';

                return $btn;
            })->rawColumns(['action'])
            ->make(true);
        }
        $hr = user::get();
        return view('admin.HrList',compact('hr'));
        // return view('admin.HrList');
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('jeet');
        //  if($request->ajax())
        // {
            
        //  $query=interviewer::get();
            
        //     return datatables()->of($query)->addIndexColumn()
            
        //     ->addColumn('action', function($row){

        //         $btn = '<div class="d-flex justify-content-around align-items-center"><a href="'.route('Edit.show',$row->id).'" class="edit mr-3"><i class="fa fa-eye"></i></a>';
                
        //         $btn = $btn.'<button class="btn deleteCategory" data-id="'.$row->id.'"><i class="fa fa-trash"></i></button>';

        //         $btn = $btn.'<a href="'.route('Edit.edit',$row->id).'" class="edit mr-3"><i class="fa fa-edit"></i></a></div>';

        //         return $btn;
        //     })->rawColumns(['action'])
        //     ->make(true);
        // }
        $interviewer = interviewer::get();

      // $technology = technology::with('tech')->get();
            
      // catch(Exception $exception)
      //   {
      //       throw new \App\Exceptions\NotFoundException('Something Went wrong');

      //   } 
        return view('admin.CandidateList',['interviewer'=>$interviewer]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('hr.candidate');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
