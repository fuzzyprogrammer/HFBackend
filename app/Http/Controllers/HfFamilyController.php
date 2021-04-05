<?php

namespace App\Http\Controllers;

use App\Models\HfAddress;
use App\Models\HfContact;
use App\Models\HfFamily;
use App\Models\HfFamilyAddress;
use App\Models\HfFamilyBank;
use App\Models\HfFamilyContact;
use App\Models\HfFamilyFood;
use App\Models\HfFamilyLanguage;
use App\Models\HfFamilyMember;
use App\Models\HfShelter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HfFamilyController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLastFamilyCode()
    {
        $lastFamily = HfFamily::latest()->first();
        if($lastFamily){
            $familyCode = $lastFamily->family_code;
            $lastFamilyCode = substr($familyCode,2);
        }else{
            $lastFamilyCode = 0;
        }

        return $lastFamilyCode;
    }

    public function getFamilyCode()
    {
        $value = sprintf("HF%03d",1+intval($this->getLastFamilyCode()));
        return $value;
    }

    public function index()
    {
        $families = HfFamily::all();
        $families->map(function($family){
            $family['imgUrl'] = url($family->ration_img_url);
            $family['street'] = $family->currentFamilyAddress->address->street;
            $family['members'] = $family->familyMember->count();
            return [
                $family,
            ];
        });

        return response()->json($families);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request = (object) $request->json()->all();
        // return response($request, 201);
        $address = HfAddress::create([
            'address' => $request->address,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
        ]);

        $family = HfFamily::create([
            'family_code' => $this->getFamilyCode(),
            'name'=>$request->name,
            'religion'=>$request->religion,
            'ration_card_type'=>$request->ration_card_type,
            'ration_card_no'=>$request->ration_card_no,
            'income'=>$request->income,
            'income_source'=>$request->income_source,
            'user_id'=>$request->user_id,
        ]);

        $familyAddress = HfFamilyAddress::create([
            'address_id' => $address->id,
            'family_id' => $family->id,
        ]);

        HfShelter::create([
            'ownership' => $request->shelter_ownership,
            'type' => $request->shelter_type,
            'support_required' => $request->shelter_support_required,
            'family_id' => $family->id,
        ]);

        HfFamilyBank::create([
            'account_no' => $request->account_no,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'ifsc_code' => $request->ifsc_code,
            'family_id' => $family->id,
        ]);

        HfFamilyFood::create([
            'family_id' => $family->id,
            'source' => $request->food_source,
            'support_required' => $request->food_support_required,
        ]);

        $contact_list = [];

        // $data = $request->contacts;
        // return response($data);

        $tempArray = json_decode($request->contacts, true);
        foreach ((array)$tempArray as $contact) {
            $contct = HfContact::create([
                'contact_type' => $contact['type']['name'],
                'value' => $contact['value'],
            ]);
            array_push($contact_list, $contct->id);
        }

            // return response($contact_list);


        foreach ($contact_list as $contact) {
            HfFamilyContact::create([
                'contact_id'=>$contact,
                'family_id'=>$family->id,
            ]);
        }

        $familyLanguageId = HfFamilyLanguage::create([
            'language_id'=>$request->language_id,
            'family_id' => $family->id,
        ]);



        if($request->has('ration_img_url')){
            $path = $request->file('ration_img_url')->move('families/rationCardImg/'.$family->id);
        }

        $family->update([
            'family_address_id' => $familyAddress->id,
            'family_language_id' => $familyLanguageId->id,
            'ration_img_url' => $path,
        ]);

        return response()->json($family, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HfFamily  $hfFamily
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hfFamily = HfFamily::where('id', $id)->first();
        $hfFamily['ration_img_url'] = url($hfFamily->ration_img_url);
        $hfFamily['address']=$hfFamily->currentFamilyAddress->address->address;
        $hfFamily['street']=$hfFamily->currentFamilyAddress->address->street;
        $hfFamily['city']=$hfFamily->currentFamilyAddress->address->city;
        $hfFamily['state']=$hfFamily->currentFamilyAddress->address->state;
        $hfFamily['pincode']=$hfFamily->currentFamilyAddress->address->pincode;
        $hfFamily['country']=$hfFamily->currentFamilyAddress->address->country;
        $hfFamily['contacts'] = $hfFamily->familyContact->map(function ($contact){
            return [
                'type'=>$contact->contact->contact_type,
                'value'=>$contact->contact->value
            ];
        });

        return response()->json($hfFamily);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HfFamily  $hfFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HfFamily $hfFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HfFamily  $hfFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(HfFamily $hfFamily)
    {
        //
    }


}
