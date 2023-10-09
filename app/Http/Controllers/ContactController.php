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
        $contacts=Contact::latest()->where(function($query){

            if($companyId = request()->query('company_id')){

                $query->where('company_id',$companyId);

            }

        })->paginate(10);
        /* $perPage=10;
        $currentPage=request()->query('page',1);
        $items = $contactsCollection->slice(($currentPage*$perPage)-$perPage,$perPage);
        $total= $contactsCollection->count();

       $contacts= new LengthAwarePaginator($items, $total, $perPage, $currentPage,['path'=> request()->url(),'query'=> request()->query()]);
 */
    
        return view('contacts.index',compact('contacts','companies'));
    }

    public function create()
    { 
        $contact = new Contact();
        $companies = $this->company->pluck();
        return view('contacts.create',compact('companies','contact'));
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);

    return view('contacts.show')->with('contact',$contact);
    }

    public function store(Request $request)
    {
        $request->validate([

            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
  
        ]);
        
        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been added successfully');
    }


    public function edit($id)
    {
        $companies=$this->company->pluck();
        $contact=Contact::findOrFail($id);

    return view('contacts.edit', compact('contact','companies'));
    }

    public function update(Request $request,$id)
    {
        $contact=Contact::findOrFail($id);
        
        $request->validate([

            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'required|exists:companies,id'
  
        ]);
        
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated successfully');
    }

    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route('contacts.index')->with('message','Contact has been removed successfully');
    

    }
}
