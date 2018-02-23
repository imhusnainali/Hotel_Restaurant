@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Add Menu</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'set_menu', 'files' => false]) !!}
                    <!-- {{ Form::open(array('url' => 'hotel/create', 'method' => 'get')) }} -->
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr class="">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Form::label('lb_hotel_name', 'ชื่อโรงแรม') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="hotel_id">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_restaurant_name', 'ชื่อร้านอาหาร') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="restaurant_id">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_name', 'ชื่อเมนู') }}</td>
                                <td>{{ Form::text('menu_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อเมนู']) }}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_date_start', 'เริ่มตั้งแต่วันที่') }}</td>
                                <td>{{ Form::text('menu_date_start', null, ['class' => 'form-control', 'placeholder' => 'คลิกเลือกวัน']) }}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_date_end', 'สิ้นสุดวันที่') }}</td>
                                <td>{{ Form::text('menu_date_end', null, ['class' => 'form-control', 'placeholder' => 'คลิกเลือกวัน']) }}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_date_select', 'เลือกวัน') }}</td>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="sun"> Sun.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="mon"> Mon.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="tues"> Tues.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="wed"> Wed.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="thurs"> Thurs.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="fri"> Fri.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="date_check_box[]" value="sat"> Sat.
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_time_lunch_start', 'เวลาเริ่มช่วงกลางวัน') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="menu_time_lunch_start">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_time_lunch_end', 'เวลาสิ้นสุดช่วงกลางวัน') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="menu_time_lunch_end">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_time_dinner_start', 'เวลาเริ่มช่วงกลางคืน') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="menu_time_dinner_start">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_menu_time_dinner_end', 'เวลาสิ้นสุดช่วงกลางคืน') }}</td>
                                <td>
                                    <div class="form-group">                     
                                        <select class="form-control" name="menu_time_dinner_end">
                                            <!--option value="" disabled selected>please_selected</option-->

                                            <option value="">  </option>

                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_price', 'ราคาต่อคน') }}</td>
                                <td>{{ Form::text('menu_price', null, ['class' => 'form-control', 'placeholder' => '00.00']) }}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_guest', 'จำนวนคน') }}</td>
                                <td>{{ Form::text('menu_guest', null, ['class' => 'form-control', 'placeholder' => 'จำนวนคน']) }}</td>
                            </tr>
                            <tr>
                                <td>{{ Form::label('lb_set_menu_comment', 'รายละเอียด') }}</td>
                                <td>{{ Form::textarea('set_menu_comment', null, ['class' => 'form-control', 'placeholder' => 'รายละเอียด']) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <center>
                        {{ Form::submit('Add Menu', ['class' => 'btn btn-primary']) }}
                    </center>
                    {{ csrf_field() }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
