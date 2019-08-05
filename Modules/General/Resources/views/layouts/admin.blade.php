@extends('general::partial.admin.dashboard')
@section('title')
{{trans('panel.dcommercedashboard')}}
@endsection
@section('content')
<div class="row">

    <div class="col-md-3">
        <div class="box_sales colorblue">
            <a href="{{url('admin/orders')}}">
                <h3>{{trans('panel.totalsales')}}</h3>
                <p> {{trans('home.sar')}}</p>

            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box_sales colorred">
            <a href="{{url('admin/orders?Status=Returned')}}">
                <h3>{{trans('panel.totalreturned')}}</h3>

                <p> {{trans('home.sar')}}</p>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box_sales coloryellow">
            <a href="{{url('admin/orders')}}/#">
                <h3>{{trans('panel.totalprofit')}}</h3>
                <p> {{trans('home.sar')}}</p>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box_sales colortrequaz">
            <a href="{{url('admin/orders')}}">
                <h3>{{trans('panel.totalorders')}}</h3>
              {{-- <?php #$TotalOrders = App\Http\Controllers\AdminController::TotalOrders(); ?>
                <p> {{ trans('panel.Orders') }}</p>
            </a>
        </div>
    </div>

</div>


<h4>{{trans('panel.customersorders')}}</h4>

<?php
#$MonthlyTotalSales = App\Http\Controllers\ChartController::getUsersOrders();
#Lava::ColumnChart('MonthlyTotalSales', $MonthlyTotalSales, [
   # 'title' => 'Customers & Orders Last 7 months',
    ##   'position' => 'in'
   # ]
#]);
?>
<div id="monthssales"></div>


<hr>



<h4>{{trans('panel.thisweeksales')}}</h4>



<div id="daysslaes"></div>



<hr>

<div class="row">

    <div class="col-md-6 ">
        <h4>{{trans('panel.totallastyearssales')}}</h4>

        <div id="yearssales"></div>

    </div>

    <div class="col-md-6 ">
        <h4>{{trans('panel.bestsealingproducts')}}</h4>

        <div id="TopProducts"></div>
    </div>

</div>





@stop
