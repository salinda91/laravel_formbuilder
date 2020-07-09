@extends('layouts.app2')

@section('extra-css')
    <style>
        .details-div {
            border: 1px solid #ccc;
            padding: 5px 0px;
            display: none;
        }

        .input-append {
            width: 75%;
            float: left;
            margin-right: 10px;
        }

        .preview-element-div {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .preview-other p {
            margin-bottom: 0px;
        }

        .preview-other {
            background: #eee;
            margin-top: 5px;
            padding: 10px;
        }
    </style>
@endsection

@section('extra-js')
    <script>
        var form_data = Array();

        $('#element_type').change(function (e) {
            var value = $('#element_type').val();
            var element = $('#element_type option:selected').attr('data-element');
            if (value != '') {
                $('.details-div').show();
                setDefaultValues();
                enableBtn('#add_element_btn');
            } else {
                $('.details-div').hide();
                resetDefaultValues();
                disableBtn('#add_element_btn');
            }
            if (value == 'select') {
                $('#extra').html(selectOption('Options'));
            } else if (value == 'radio' || value == 'checkbox') {
                $('#extra').html(selectOption('Values'));
            } else {
                $('#extra').html('');
            }
        });

        //select option
        function selectOption(text) {

            return '<br><p>' + text + '</p><div class="controls">\n' +
                ' <div class="col-md-12"><button class="btn btn-info btn-sm" onclick="append()">Add new Field</button></div>\n' +
                '                <br>\n' +
                '                <br>\n' +
                '            </div>'

        }

        function option() {

        }

        function append() {
            $("#extra").append('<div class="controls col-md-12"><input type="text" class="form-control input-append" name="values[]" placeholder="textbox"/>\
                <a href="#" class="remove_this btn btn-danger">remove</a>\
                <br>\
                <br>\
            </div>');
        }

        jQuery(document).on('click', '.remove_this', function () {
            jQuery(this).parent().remove();
            return false;
        });

        //add element
        $('#add_element_btn').click(function () {
            var label = $('#label').val();
            var name = $('#name').val();
            var css_class = $('#css_class').val();
            var id = $('#id').val();
            var type = $('#type').val();
            var required = $('#required').val();
            var element = $('#element').val();
            var errors = '';

            if (errors == '') {
                var data = Array();
                var values = Array();

                var test_arr = $("input[name*='values']");
                $.each(test_arr, function (i, item) {  //i=index, item=element in array
                    var ele = Array();
                    var itemValue = $(item).val();
                    values.push({
                        'key': itemValue.toLowerCase().replace(' ', '_'),
                        'value': $(item).val()
                    });
                });

                form_data.push({
                    'label': label,
                    'name': name,
                    'css_class': css_class,
                    'id': id,
                    'type': type,
                    'required': required,
                    'element': element,
                    'values': values
                });
                // console.log(form_data);
                clearText();
                renderView();
            }


        });

        function enableBtn(id) {
            $(id).removeClass('disabled');
        }

        function disableBtn(id) {
            $(id).addClass('disabled');
        }

        function clearText() {
            $('#label').val('');
            $('#name').val('');
            $('#css_class').val('form-control');
            $('#id').val('');
            $('#type').val('');
            $('#required').val(0);
            $('#extra').html('');
        }

        function setDefaultValues() {
            var type = $('#element_type').val();
            var element = $('#element_type option:selected').attr('data-element');
            $('#type').val(type);
            $('#element').val(element);

            if (type == 'submit') {
                $('#css_class').val('btn btn-success');
            } else if (type == 'reset') {
                $('#css_class').val('btn btn-warning');
            } else {
                $('#css_class').val('form-control');
            }
        }

        function resetDefaultValues() {
            $('#type').val('');
            $('#element').html('');
        }

        //render views
        function renderView() {
            var html = '';
            form_data.forEach(function (item, index, arr) {
                html = html + '<button class="btn btn-danger btn-sm pull-right" onclick="deleteElement(' + index + ')">Delete Element</button>';
                html = html + setViewType(item);

            });
            $('#render_view').html(html);
        }

        function setViewType(item) {
            var html = '<div class="form-group preview-element-div">\n';

            switch (item.element) {
                case 'select':

                    var ele = html + '<label for=""><small>Label : </small>' + item.label + '</label>\n' +
                        '<select class="' + item.css_class + '">\n';

                    var options = '';
                    item.values.forEach(function (itm, index, arr) {
                        options = options + '<option value="' + itm.key + '">' + itm.value + '</option>'
                    });

                    ele = ele + options + '</select>';


                    return ele + viewOthers(item);

                    break;

                case 'input':
                    var ele = html + '<label for=""><small>Label : </small>' + item.label + '</label>\n' +
                        '<input class="' + item.css_class + '" type="' + item.type + '">\n';

                    return ele + viewOthers(item);

                    break;

                case 'textarea':
                    var ele = html + '<label for=""><small>Label : </small>' + item.label + '</label>\n' +
                        '<textarea class="' + item.css_class + '"></textarea>\n';

                    return ele + viewOthers(item);

                    break;

                case 'radio':

                    var ele = html;

                    var options = '';
                    item.values.forEach(function (itm, index, arr) {
                        options = options + '<input type="' + item.type + '" name="' + item.name + '" value="' + itm.key + '">&nbsp;&nbsp;&nbsp;<label for="">' + itm.value + '</label><br>\n';
                    });

                    ele = ele + options;


                    return ele + viewOthers(item);

                    break;

                case 'checkbox':

                    var ele = html;

                    var options = '';
                    item.values.forEach(function (itm, index, arr) {
                        options = options + '<input type="' + item.type + '" name="' + item.name + '" value="' + itm.key + '">&nbsp;&nbsp;&nbsp;<label for="">' + itm.value + '</label><br>\n';
                    });

                    ele = ele + options;


                    return ele + viewOthers(item);

                    break;

                case 'button':
                    var ele = html + '<input class="' + item.css_class + '" type="' + item.type + '" value="' + item.label + '">\n';

                    return ele + viewOthers(item);

                    break;
            }
        }

        function required(val) {
            if (val) {
                return 'Required';
            } else {
                return 'Not Required';
            }
        }

        function viewOthers(item) {
            return '<div class="preview-other">' +
                '<p>Type : ' + item.type + '</p>' +
                '<p>Name : ' + item.name + '</p>' +
                '<p>ID : ' + item.id + '</p>' +
                '<p>Css Class : ' + item.css_class + '</p>' +
                '<p>Required : ' + required(item.required) + '</p>' +
                '</div>' +
                '</div>';
        }

        function deleteElement(key) {
            if (confirm('Are you sure?')) {
                delete form_data[key];
                renderView();
            }
            // console.log(form_data);
        }

        // submit

        function submitForm() {
            var form_name = $('#formName').val();
            var form_description = $('#formDescription').val();
            $.ajax({
                url: "/formbuilder/save",
                type: 'POST',
                async: false,
                // dataType:'json',
                data: {form_data: form_data, form_name: form_name, form_description: form_description},
                success: function (res) {
                    if (res) {
                        alert('Form saved successfully!');
                        setTimeout(function () {
                            window.location.reload();
                        },2000);
                    }
                }
            });
        }

        function arrToObject(arr) {
            //assuming header
            var keys = arr[0];
            //vacate keys from main array
            var newArr = arr.slice(1, arr.length);

            var formatted = [],
                data = newArr,
                cols = keys,
                l = cols.length;
            for (var i = 0; i < data.length; i++) {
                var d = data[i],
                    o = {};
                for (var j = 0; j < l; j++)
                    o[cols[j]] = d[j];
                formatted.push(o);
            }
            return formatted;
        }
    </script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Form Builder
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form Builder</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Form Name</label>
                            <input type="text" class="form-control" name="formName" id="formName">
                        </div>
                        <div class="form-group">
                            <label for="">Form Description</label>
                            <textarea class="form-control" name="formDescription" id="formDescription"></textarea>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Build Form Here..</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Element Type</label>
                            <select name="" id="element_type" class="form-control">
                                <option value="">Select Element Type</option>
                                @foreach($form_elements as $key=>$form_element)
                                    <option value="{{$form_element->type}}" data-element="{{$form_element->element}}"
                                            data-default-css="{{$form_element->css}}">{{$form_element->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="details-div">
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Label</label>
                                <input type="hidden" class="form-control" id="type">
                                <input type="hidden" class="form-control" id="element">
                                <input type="text" class="form-control" id="label">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Name</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Class</label>
                                <input type="text" class="form-control" value="form-control" id="css_class">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">ID</label>
                                <input type="text" class="form-control" id="id">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Required Field</label>
                                <select type="text" class="form-control" id="required">
                                    <option value="0">No</option>
                                    <option value="1">yes</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div id="extra" class="control-group"></div>

                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary disabled" id="add_element_btn">Add Element</button>
                    </div>
                </div>


            </div>

            <div class="col-md-6">
                <div class="box box-primary">

                    <div class="box-body">
                        <div class="form-group col-md-6">
                            <button class="btn btn-warning btn-sm btn-block" onclick="window.location.reload();">Reset
                            </button>
                        </div>
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-sm btn-block" onclick="submitForm()">Save Form</button>
                        </div>

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Preview</h3>
                    </div>
                    <div class="box-body" style="min-height: 300px;">
                        <div id="render_view">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


