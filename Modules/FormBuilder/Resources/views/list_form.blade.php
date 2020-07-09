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
            <li><a href="#">List Forms</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Forms</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Platform(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <td>{{$form->name}}</td>
                                    <td>{{$form->description}}</td>
                                    <td>{{\Illuminate\Support\Carbon::parse($form->created_at)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{asset('')}}formbuilder/form/{{$form->id}}/view" class="btn btn-success btn-sm">
                                            view
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


