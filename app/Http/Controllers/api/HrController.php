<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController;
use Exception;

class HrController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=user::get();
        if (is_null($user)) {
            return $this->sendError('Hr not found.');
        }
        return $this->sendResponse($user->toArray(), 'Hr retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {

            $user = user::create($request->all());
        }
        catch(Exception $exception)
        {
            return $this->sendError($exception->getMessage());
        }
        return $this->sendResponse($user->toArray(), 'Hr saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user::get($id);
        if (is_null($user)) {
            return $this->sendError('Hr not found.');
        }
        return $this->sendResponse($user->toArray(), 'Hr retrieved successfully.');
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
        try
        {
            $input = $request->all();
            $user = user::findOrFail($id);
            if(user::where('email',$request->email)->count()>0){
                return $this->sendError('Validation Error.', ['Email is already taken']);
            }
            $user->update($request->all());
        }
        catch(Exception $exception) 
        {
            return $this->sendError('Hr not found.');
        }

        return $this->sendResponse($user->toArray(), 'Hr updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Hr=user::destroy($id);
        if ($Hr) {
            return $this->sendError('Hr deleted successfully.');
        }
        else
        {
            return $this->sendResponse($Hr, 'Hr could not delete.');
        }
    }
}
