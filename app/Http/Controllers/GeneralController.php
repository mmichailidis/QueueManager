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
        $query = ['Name' => $categoryName];
        $categoryId = Category::where($query)->first()->Id;

        return view('categories.show')->with('companies',Company::where(['CategoryId' => $categoryId])->get());
    }

    /**
     * Company Landing Page
     */
    public function companyIndex($categoryName, $companyName) {
        $query = ['Name' => $companyName];
        $company = Company::where($query)->first();

        if($company->CategoryId != Category::where(['Name' => $categoryName])->first()->Id) {
            redirect()->route('categories.index');
        }

        return view('company.index')->with('company',$company);
    }
}
