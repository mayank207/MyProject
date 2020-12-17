<?php

namespace App\Http\Controllers\api;

use App\technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController;

class TechController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technology=technology::paginate(10);
        if (is_null($technology)) {
            return $this->sendError('technology not found.');
        }
        return $this->sendResponse($technology->toArray(), 'technology retrieved successfully.');
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
            'technology' => 'required|unique:technology',
        ],
        [
            "technology.unique"=>"$request->technology is alerady existed"
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $technology = technology::create($input);
        return $this->sendResponse($technology->toArray(), 'technology created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technology = technology::find($id);
        if (is_null($technology)) {
            return $this->sendError('technology not found.');
        }
        return $this->sendResponse($technology->toArray(), 'technology retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, technology $technology)
   {
        $input = $request->all();
        $validator = Validator::make($input, [
            'technology' => 'required'
        ]);
        $technology = technology::findOrFail($technology);
        if(technology::where('technology',$request->technology)->count()>0){
            return $this->sendError('Validation Error.', ['technology technology is already taken']);
        }
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $technology->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technology=technology::destroy($id);
        if ($technology) {
            return $this->sendError('technology deleted successfully.');
        }
        else
        {
            return $this->sendResponse($technology, 'technology could not delete.');
        }
    }
}
    