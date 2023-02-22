<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactController extends Controller
{
    //
    //protected $company;
    public function __construct(protected CompanyRepository $company, Request $request)

    {  
        //$this->company= $company;
        //$this->company= new CompanyRepository();
    }
    

    //Eğitim amaçlı yapılmıştır. Injection işlemi constructor ile yapıldığından gerek yoktur. 
    
    public function index(CompanyRepository $company)
    {
       /*  $companies = [
            1 => ['name' => 'Company One', 'contacts' => 3],
            2 => ['name' => 'Company Two', 'contacts' => 5],
        ]; */
    
        $companies=$this->company->pluck();
       // $contacts=Contact::latest()->paginate(10);
        $contactsCollection=Contact::latest()->get();
        $perPage=10;
        $currentPage=request()->query('page',1);
        $items = $contactsCollection->slice(($currentPage*$perPage)-$perPage,$perPage);
        $total= $contactsCollection->count();

       $contacts= new LengthAwarePaginator($items, $total, $perPage, $currentPage,['path'=> request()->url(),'query'=> request()->query()]);

    
        return view('contacts.index',compact('contacts','companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }


    public function show($id)
    {
        $contact=Contact::findOrFail($id);

    return view('contacts.show')->with('contact',$contact);
    }

}
