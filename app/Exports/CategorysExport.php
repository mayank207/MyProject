<?php

namespace App\Exports;

use App\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;


class CategorysExport implements FromCollection,WithMapping,WithHeadings
{
    use Exportable;
    public function __construct(int $page)
    {
        $this->page = $page;
    }

    public function headings() : array
    {
        return [
            'id',
            'technology',
            'created_at'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd($this->year);
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/management/public/api/tech?page=$this->page");

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $output = curl_exec($ch);
            $a=json_decode($output,true);
            curl_close($ch);
            // return $a['data']['data'];
            // dd(Category::all());
            // return Category::all();
            return new Collection($a['data']['data']);
        // return $a->data;
    }
    public function map($category) : array
    {
        // dd($category);
        return[
            $category['id'],
            $category['technology'],
            $category['created_at']
        ];
    }
    // public function query()
    // {
        // dd('aa');
    //     return Category::all();
    // }
    // public function view() : View
    // {
    //     return view('example', [
    //         'invoices' => Category::all()
    //     ]);
    // }
    // public function map($invoice): array
    // {
    //     return [
    //         $invoice->invoice_number,
    //         Date::dateTimeToExcel($invoice->created_at),
    //     ];
    // }
}