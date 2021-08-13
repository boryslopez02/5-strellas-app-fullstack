<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->ajax()){
            return Account::where('user_id', auth()->user()->id)->get();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account();
        $account->user_id = auth()->user()->id;
        $account->name = $request->name;
        $account->last_name = $request->lastName;
        $account->email = $request->email;
        $account->gender = $request->gender;
        $account->country = $request->country;
        $account->paypal = $request->paypal;
        $account->other_pay_methods = $request->otherPayMethods;
        $account->invoice_name = $request->invoiceName;
        $account->invoice_last_name = $request->invoiceLastName;
        $account->save();
        
        return $account;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->name = $request->name;
        $account->last_name = $request->lastName;
        $account->email = $request->email;
        $account->gender = $request->gender;
        $account->country = $request->country;
        $account->paypal = $request->paypal;
        $account->other_pay_methods = $request->otherPayMethods;
        $account->invoice_name = $request->invoiceName;
        $account->invoice_last_name = $request->invoiceLastName;
        $account->save();

        return $account;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
