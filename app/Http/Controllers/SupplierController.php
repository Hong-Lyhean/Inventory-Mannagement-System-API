<?php

namespace App\Http\Controllers;

use App\Http\Customize\MessageCustomize;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return SupplierResource::collection($suppliers)
            ->additional((new MessageCustomize)->MessageSuccessGet("suppliers"));
    }

    public function show($id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return (new MessageCustomize)->MessageInvalidedValue("suppliers", $id);
        }else{
            return (new SupplierResource($supplier))
                ->additional((new MessageCustomize())
                    ->MessageSuccessShow("supplier", $id));
        }
    }

    public function store(SupplierRequest $request){
        $request->validated();

        $supplier = Supplier::create([
            "name" => $request->name,
            "address" => $request->address,
            "phone" => $request->phone,
            "fax" => $request->fax,
            "email" => $request->email,
            "other_detail" => $request->other_detail,
        ]);

        return (new SupplierResource($supplier))
            ->additional(
                (new MessageCustomize())
                    ->MessageSuccessCreate("supplier")
            );
    }

    public function update(SupplierRequest $request, $id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return (new MessageCustomize)->MessageInvalidedValue("suppliers", $id);
        }else{
            $request->validated();

            $supplier->update([
                "name" => $request->name,
                "address" => $request->address,
                "phone" => $request->phone,
                "fax" => $request->fax,
                "email" => $request->email,
                "other_detail" => $request->other_detail,
            ]);

            return (new SupplierResource($supplier))
                ->additional(
                    (new MessageCustomize())
                        ->MessageSuccessUpdate("supplier", $id)
                );
        }
    }

    public function destroy($id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return (new MessageCustomize())->MessageInvalidedValue("supplier", $id);
        }else{
            $supplier->delete();
            return (new SupplierResource($supplier))
                ->additional((new MessageCustomize())
                    ->MessageSuccessDelete("supplier", $id));
        }
    }
}
