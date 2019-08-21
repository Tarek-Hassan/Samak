@extends('general::layouts.admin')

@section('title',__('general.admin'))

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ __('general.order') }}
                        </h3>
                    </div>
                </div>
            </div>



            <form class="forms-sample col-md-9" action="{{ route('order.store') }}" method="post"
                enctype="multipart/form-data">

                @csrf

                @foreach($carts as $cart)
                <input type="hidden" name="cart[]" value="{{$cart}}">
                @endforeach
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="totalprice" value="">
                <div class="form-group m-form__group row">
                    <div class="col-md-10">
                        <label for="exampleSelect1">
                            Gender
                        </label>
                        <select class="form-control m-bootstrap-select m_selectpicker" required name="status">
                            <option value="process">process
                            </option>
                            <option value="waiting">waiting
                            </option>
                            <option value="compeleted">compeleted
                            </option>



                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">estimatedtime</label>
                        <div class="input-group date col-md-9" id="timepicker-example" data-target-input="nearest">
                            <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
                                <input type="text" name="estimatedtime" id="timepicker" class="form-control "
                                    data-target="#timepicker-example" />
                                <div class="input-group-addon input-group-append">
                                    <i class="la la-clock-o input-group-text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-md-10">
                        <label for="exampleSelect1">
                            paymentmethod
                        </label>
                        <select class="form-control m-bootstrap-select m_selectpicker" required name="payment_id"
                            data-live-search="true">
                            @foreach($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->paymentmethod}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">country</label>
                    <input type="text" class="form-control" name="country" value="{{ old('country') }}"
                        id="exampleInputName1" placeholder="country">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">city</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="exampleInputName1"
                        placeholder="city">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">street</label>
                    <input type="text" class="form-control" name="street" value="{{ old('street') }}"
                        id="exampleInputName1" placeholder="street">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">deliveryfee</label>
                    <input type="text" class="form-control" name="deliveryfee" value="{{ old('deliveryfee') }}"
                        id="exampleInputName1" placeholder="deliveryfee">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                    <button class="btn btn-light">
                        <a href="{{route('order.index')}}" class="btn btn-secondary">
                            {{ __('general.cancel') }}
                        </a>
                    </button>
                </div>


            </form>

        </div>

    </div>
</div>

@endsection
@section('script')
<script>
    $(function () {
        $("#datepicker").datepicker();

        $("#timepicker").timepicker();

    });

</script>
@endsection
