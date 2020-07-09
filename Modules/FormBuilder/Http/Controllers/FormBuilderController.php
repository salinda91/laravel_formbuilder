<?php

namespace Modules\FormBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\FormBuilder\Entities\Form;
use Modules\FormBuilder\Entities\FormStructure;
use Modules\FormBuilder\Entities\InputData;
use Modules\FormBuilder\Entities\Value;

class FormBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $form_elements = InputData::where('status', 1)->get();
        return view('formbuilder::index')
            ->with('form_elements', $form_elements);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('formbuilder::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

//        save form
        $form_id = Form::insertGetId([
            'user_id' => Auth::user()->id,
            'name' => $request['form_name'],
            'description' => $request['form_description'],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        foreach ($request['form_data'] as $key => $formdata) {
//            dd($formdata['values']);
            $form_structure_id = FormStructure::insertGetId([
                'form_id' => $form_id,
                'label' => $formdata['label'],
                'type' => $formdata['type'],
                'name' => $formdata['name'],
                'css' => $formdata['css_class'],
                'required' => $formdata['required'],
                'element_id' => $formdata['id'],
                'element' => $formdata['element'],
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
            if (array_key_exists('values', $formdata)) {
                if (count($formdata['values'])) {
                    foreach ($formdata['values'] as $val) {

                        Value::insert([
                            'form_id' => $form_id,
                            'form_structure_id' => $form_structure_id,
                            'name' => $val['key'],
                            'value' => $val['value'],
                            'status' => 1,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        ]);

                    }
                }
            }

        }


        return \response()->json(1);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $form = Form::where('id', $id)->with([
            'form_structure' => function ($a) {
                $a->with('values');
            },'user'])->first();
//        dd($form);
        return view('formbuilder::view_form')->with('form',$form);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('formbuilder::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }


    public function listForms()
    {
        $forms = Form::where('user_id', Auth::user()->id)->get();
//        dd($forms);
        return view('formbuilder::list_form')
            ->with('forms', $forms);
    }
}
