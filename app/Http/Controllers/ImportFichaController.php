<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FichasImport;

class ImportFichaController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new FichasImport, $request->file('file')->store('temp'));
        return back();
    }

      public function importExcel(Request $request) 
    {

        $file = $request->import_file;
        $name=$file->getClientOriginalName();
        $destination = public_path() . '/fichas_import/';
        $file->move($destination, $name);

        \Excel::import(new FichasImport,public_path('fichas_import/'.$name));

        \Session::put('success', 'Your file is imported successfully in database.');
           
        return back()->with('success','Se importaron las fichas correctamente');
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function fileExport() 
    // {
    //     return Excel::download(new UsersExport, 'users-collection.xlsx');
    // }    
}