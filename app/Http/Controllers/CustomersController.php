<?php

namespace App\Http\Controllers;

use App\Events\NewCustomerHasRegisterEvent;
use App\Mail\WelcomeNewUserMail;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    public function index(){
//        $this->authorize('create', Customer::class);
        $customers = Customer::with('company')->paginate(3);
        $companies = Company::all();
//        dd($customers->toArray());
        return view('customers.index', compact('customers', 'companies'));
    }

    public function create(){
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('customer', 'companies'));
    }
    public function store(Request $request){
        $this->authorize('create', Customer::class);

        $customer = new Customer($this->validateRequest());

        $customer->save();

        $this->storeImage($customer);

        event(new NewCustomerHasRegisterEvent($customer));

        return redirect('customers')->with('message', 'Customer Created Successfully');
    }

    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){
        $companies =  Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }
    public function update(Customer $customer){
        $customer->update($this->validateRequest());
        $this->storeImage($customer);
        return redirect('customers/'. $customer->id);
    }

    public function destroy(Customer $customer){
//        $message = "Customer Deleted Successfully";
        $this->authorize('delete', $customer);
        $customer->delete();
        return redirect('customers');
    }

    public function validateRequest(){
        return request()->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'active_user'=> 'required',
                'company_id'=> 'required',
                'image' => 'sometimes|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
//            function (){
//            if (request()->hasFile('image')){
////                dd(request()->image);
//                request()->validate([
//                    'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                ]);
//            }
//        }
        );
    }

    public function storeImage($customer)
    {
        if(request()->has('image')){
         $customer->update([
            'image' => request()->image->store('uploads' , 'public')
         ]);

         $image = Image::make(public_path('storage/'. $customer->image))->fit(200, 200);
         $image->save();
        }
    }

}
