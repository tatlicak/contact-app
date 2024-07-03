<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
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

      /*  DB::enableQueryLog(); */ 
        $contacts=Contact::allowedTrash()
                        ->allowedSorts(['first_name','last_name','email'],"-id")  
                        ->allowedFilters('company_id')
                        ->allowedSearch('first_name','last_name','email')
                        ->paginate(10);
           
        /* $perPage=10;
        $currentPage=request()->query('page',1);
        $items = $contactsCollection->slice(($currentPage*$perPage)-$perPage,$perPage);
        $total= $contactsCollection->count();

       $contacts= new LengthAwarePaginator($items, $total, $perPage, $currentPage,['path'=> request()->url(),'query'=> request()->query()]);
 */
        /* dump(DB::getQueryLog()); */
        return view('contacts.index',compact('contacts','companies'));
    }

    public function create()
    { 
        $contact = new Contact();
        $companies = $this->company->pluck();
        return view('contacts.create',compact('companies','contact'));
    }


    public function show(Contact $contact) {
    

    return view('contacts.show')->with('contact',$contact);
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been added successfully');
    }


    public function edit($id)
    {
        $companies=$this->company->pluck();
$contact=Contact::findOrFail($id);

    return view('contacts.edit', compact('contact','companies'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
      
        
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated successfully');
    }

    
    public function destroy(Contact $contact)
    {
        
        $contact->delete();

        $redirect = request()->query('redirect');

        return ($redirect ? redirect()->route($redirect) : back())

            ->with('message','Contact has been moved to trash successfully')

            ->with('undoRoute', $this->getUndoRoute('contacts.restore', $contact)); 
    

    }

    public function restore(Contact $contact)
    {
    
        $contact->restore();

        return back()

            ->with('message','Contact has been restored from trash ')

            ->with('undoRoute', $this->getUndoRoute('contacts.destroy', $contact));
    

    }

    protected function getUndoRoute($name, $resource)
    {

        return request()->missing('undo') ? route($name, [$resource->id, 'undo' => true]) : null;
        
    }

    public function forceDelete(Contact $contact)
    {
        
        $contact->forceDelete();

        return back()->with('message','Contact has been removed permanently.');
    

    }
}
