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
                                {{ __('admin.edit') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <form class="forms-sample col-md-9" action="{{ route('info.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">
                        <label for="exampleInputName1">phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $data['phone']??'') }}"
                               id="exampleInputName1"
                               placeholder="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address', $data['address']??'') }}"
                               id="exampleInputName1"
                               placeholder="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">website</label>
                        <input type="url" class="form-control" name="website" value="{{ old('website', $data['website']??'') }}"
                               id="exampleInputName1"
                               placeholder="website">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $data['email']??'') }}"
                               id="exampleInputName1"
                               placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">cuttingprice</label>
                        <input type="number" class="form-control" name="cuttingprice" value="{{ old('cuttingprice', $data['cuttingprice']??'') }}"
                               id="exampleInputName1"
                               placeholder="cuttingprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">cleaningprice</label>
                        <input type="number" class="form-control" name="cleaningprice" value="{{ old('cleaningprice', $data['cleaningprice']??'') }}"
                               id="exampleInputName1"
                               placeholder="cleaningprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">cookingprice</label>
                        <input type="number" class="form-control" name="cookingprice" value="{{ old('cookingprice', $data['cookingprice']??'') }}"
                               id="exampleInputName1"
                               placeholder="cookingprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">deliveryprice</label>
                        <input type="number" class="form-control" name="deliveryprice" value="{{ old('deliveryprice', $data['deliveryprice']??'') }}"
                               id="exampleInputName1"
                               placeholder="deliveryprice">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                        <button class="btn btn-light">
                            <a href="{{route('info.index')}}"
                               class="btn btn-secondary">
                                {{ __('general.cancel') }}
                            </a>
                        </button>
                    </div>


                </form>

            </div>

        </div>
    </div>

@endsection



