@extends('layouts.app2')

@section('extra-css')
    <style>

    </style>
@endsection

@section('extra-js')
    <script>

    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            List Forms
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">View Form</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Forms</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box box-solid">
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">

                                    <li><a href="#">Form Name: <span class="pull-right">{{$form->name}}</span></a></li>
                                    <li><a href="#">Form Description: <span
                                                    class="pull-right">{{$form->description}}</span></a></li>
                                    <li><a href="#">Created By: <span
                                                    class="pull-right">{{$form->user->name}}</span></a></li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Forms</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @foreach($form->form_structure as $form_st)
                            <div class="form-group">
                                @if($form_st->element != 'button')
                                    <label for="">{{($form_st->label)?$form_st->label:''}}</label>
                                @endif
                                @if($form_st->element == 'input')
                                    <input type="{{$form_st->type}}" name="{{$form_st->name}}" class="{{$form_st->css}}"
                                           id="{{$form_st->element_id}}" {{($form_st->required)?'required':''}}>
                                @elseif($form_st->element == 'select')
                                    <select name="{{$form_st->name}}" class="{{$form_st->css}}"
                                            id="{{$form_st->element_id}}" {{($form_st->required)?'required':''}}>
                                        <option value="">Select {{$form_st->label}}</option>
                                        @foreach($form_st->values as $val)
                                            <option value="{{$val->name}}">{{$val->value}}</option>
                                        @endforeach
                                    </select>

                                @elseif($form_st->element == 'textarea')
                                    <textarea name="{{$form_st->name}}" class="{{$form_st->css}}"
                                              id="{{$form_st->element_id}}"
                                            {{($form_st->required)?'required':''}}></textarea>
                                @elseif($form_st->element == 'radio' OR $form_st->element == 'checkbox')
                                    @foreach($form_st->values as $val)
                                        <input type="{{$form_st->type}}" name="{{$form_st->name}}"
                                               class="{{$form_st->css}}"
                                               id="{{$form_st->element_id}}"
                                               {{($form_st->required)?'required':''}} value="{{$val->value}}">
                                        <label for="">{{$val->name}}</label>
                                    @endforeach
                                @endif
                            </div>

                            @if($form_st->element == 'button')
                                <div class="form-group">
                                    <input type="{{$form_st->type}}" name="{{$form_st->name}}" class="{{$form_st->css}}"
                                           id="{{$form_st->element_id}}" }} value="{{$form_st->label}}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection


