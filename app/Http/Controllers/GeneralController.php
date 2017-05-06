<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use Illuminate\Http\Request;

use App\Http\Requests;

class GeneralController extends Controller
{
    public function index(){
        return view('categories.index')->with('categories',Category::all());
    }

    public function show($categoryName) {
        $query = ['CategoryId' => $categoryName];

        return view('categories.show')->with('companies',Company::where($query)->get());
    }

    public function companyIndex($categoryName, $companyName) {
        $company = Company::find($companyName);

        if($company->CategoryId != $categoryName) {
            redirect()->route('categories.index');
        }

        return view('company.index')->with('company',$company);
    }
}
