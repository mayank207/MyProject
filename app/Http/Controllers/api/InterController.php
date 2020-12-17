<?php

namespace App\Http\Controllers\api;
use App\interviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController;
use Exception;


class interController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewer=interviewer::get();
        if (is_null($interviewer)) {
            return $this->sendError('interviewer not found.');
        }
        return $this->sendResponse($interviewer->toArray(), 'interviewer retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|unique:interviewer,name',
        ],
        [
            "name.unique"=>"$request->name Category is alerady existed"
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $category = interviewer::create($input);
        return $this->sendResponse($category->toArray(), 'interviewer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interviewer = interviewer::find($id);
        if (is_null($interviewer)) {
            return $this->sendError('interviewer not found.');
        }
        return $this->sendResponse($interviewer->toArray(), 'interviewer retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        $interviewer = interviewer::findOrFail($id);
        if(interviewer::where('name',$request->name)->count()>0){
            return $this->sendError('Validation Error.', ['technology technology is already taken']);
        }
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $interviewer->update($request->all());
       
      


        return $this->sendResponse($interviewer->toArray(), 'technology updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interviewer=interviewer::destroy($id);
        if ($interviewer) {
            return $this->sendError('interviewer deleted successfully.');
        }
        else
        {
            return $this->sendResponse($interviewer, 'interviewer could not delete.');
        }
    }
}
    