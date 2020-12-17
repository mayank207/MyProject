<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Exception;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('email');
    }
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        if($validatedData){
            $details=[
                "email"=>"Mayank82000@gmail.com",
                "title"=>$request->title,
                "body"=>$request->body
            ];

            SendEmailJob::dispatch($details)->delay(now()->addMinutes(1));

            throw new \App\Exceptions\NotFoundException('Something Went wrong');
          
            return redirect()->route('email.index');
        }

    }
}
