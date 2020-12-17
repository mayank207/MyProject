<?php

namespace App\Http\Controllers;

use App\technology;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\CategorysExport;

class FaltuController extends Controller
{
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->execl=$excel;
    }
    public function index()
    {
        $all=technology::get();
        // dd($all);
        return view('hr.faltu',compact('all'));

    }
    public function serverside(Request $request)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $a=json_decode($output);
        $data=$a->data->data;
        // dd($data);
        curl_close($ch);

        $data = technology::paginate(10);

        return view('faltu',compact('data'));

    }

    public function second()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $a=json_decode($output);
        curl_close($ch);
        return view('hr.second',['category'=>$a->data]);
    }



    public function ajaxData()
    {
        return view('example');
    }

    public function loadallData(Request $request)
    {
        if($request->ajax())
        {
            $page=$request->page;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech?page=$page");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $a=json_decode($output);
            curl_close($ch);
            $current_page=$a->data->current_page;
            $prev_page=$a->data->prev_page_url;
            $last_page=$a->data->last_page;
            $next_page=$a->data->next_page_url;
            $per_page=$a->data->per_page;
            $total=$a->data->total;

            $data['data']=$a->data->data;
            $data['current_page']=$current_page;
            $data['next_page']=$next_page;
            $data['last_page']=$last_page;
            $data['per_page']=$per_page;
            $data['prev_page']=$prev_page;
            $data['total']=$total;
            return response()->json($data,200);
        }
        else
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech");

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $a=json_decode($output);
            curl_close($ch);
            $current_page=$a->data->current_page;
            $first_page=$a->data->first_page_url;
            $last_page=$a->data->last_page;
            $next_page=$a->data->next_page_url;

            $data['data']=$a->data->data;
            $data['current_page']=$current_page;
            $data['next_page']=$next_page;
            $data['last_page']=$last_page;
            return response()->json($data,200);
        }

    }
    public function delete($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech/$id");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $output = curl_exec($ch);
        curl_close($ch);
    }
    public function single_category(Request $request)
    {
        $category_id=$request->categoryid;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech/$technologyy_id");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return response()->json($output,200);
    }
    public function update(Request $request)
    {
        $data=[
            'technology'=>$request->technology
        ];
        $response=json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech/$request->id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($response)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return response()->json($output,200);
    }
    public function save(Request $request)
    {
        $data=[
            'technology'=>$request->technology
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return response()->json($output,200);
    }
    public function export(Request $request){

        $page=$request->page;
        $fileName = Carbon::now()->format('YmdHs');
        if ($request->input('exportcsv') != null ){

        //    return Excel::download(new CategorysExport(1), 'users.xlsx');
           return (new CategorysExport($page))->download($fileName.'.csv',Excel::CSV);
        // return $this->excel->download(new CategorysExport(1),'user.pdf',Excel::DOMPDF);
        }
        if($request->input('exportpdf')!=null){
            return (new CategorysExport($page))->download($fileName.'.pdf',Excel::DOMPDF);
        }
        if($request->input('exportexcel')!=null){
            return (new CategorysExport($page))->download($fileName.'.xlsx');
        }

        // if ($request->input('exportcsv') != null ){
        //     return Excel::create('filename',function($excel){
        //         $excel->setTitle('new');
        //         $excel->setCreator('Maatwebsite')
        //         ->setCompany('Maatwebsite');
        //         $excel->setDescription('A demonstration to change the file properties');

        //     })->export('csv');
        //    return Excel::download(new CategorysExport(1), 'users.csv');
        // }

        // if ($request->input('exportpdf') != null ){
        //     return Excel::download(new CategorysExport(1), 'users.csv');
        //     dd('dd');
        //     return Excel::create('filename',function($excel){
        //         $excel->setTitle('new');
        //         $excel->setCreator('Maatwebsite')
        //         ->setCompany('Maatwebsite');
        //         $excel->setDescription('A demonstration to change the file properties');

        //     })->export('csv');
         }

        // return redirect()->action('example');





}
