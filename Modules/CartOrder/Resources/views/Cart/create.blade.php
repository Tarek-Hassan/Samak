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
                            {{ __('general.admin') }}
                        </h3>
                    </div>
                </div>
            </div>



            <form class="forms-sample col-md-9" action="{{ route('cart.store') }}" method="post"
                enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="categorydetails_id" value="{{$data->id}}">
                <input type="hidden" name="price" value="">
                <div class="form-group">
                    <label for="exampleInputName1">titleAr</label>
                    <input type="text" class="form-control" name="titleAr" value="{{ old('titleAr', $data['titleAr']??'') }}"
                        id="exampleInputtitleAr1" placeholder="titleAr">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">titleEn</label>
                    <input type="text" class="form-control" name="titleEn" value="{{ old('titleEn', $data['titleEn']??'') }}"
                        id="exampleInputtitleEn1" placeholder="titleEn">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">quantity</label>
                    <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" id="exampleInputName1"
                        placeholder="quantity">
                </div>

                <div class="col-md-4 addition_type" >
                                    <div class="m-form__group form-group">
                                        <label for="">size</label>
                                        <div class="m-radio-inline" style="padding-top: 20px;">
                                            <label class="m-radio">
                                                <input type="radio"  name="size" value="2">large   {{$data->large}}
                                                <input type="hidden" name="large" value="{{$data->large}}">
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio"  name="size" value="1">medium    {{$data->medium}}
                                                <input type="hidden" name="medium" value="{{$data->medium}}">
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="size" value="0">small     {{$data->small}}
                                                <input type="hidden" name="small" value="{{$data->small}}">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                <div class="col-md-4 addition_type" >
                                    <div class="m-form__group form-group">
                                        <label for="">Cutting   {{$setting->cuttingprice}}</label>
                                        <div class="m-radio-inline" style="padding-top: 20px;">
                                            <label class="m-radio">
                                                <input type="radio"  name="cutting" value="1">Cutting
                                                <input type="hidden" name="cuttingprice" value="{{$setting->cuttingprice}}">
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="cutting" value="0">NotCutting
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                <div class="col-md-4 addition_type" >
                                    <div class="m-form__group form-group">
                                        <label for="">cleaned   {{$setting->cleaningprice}}</label>
                                        <div class="m-radio-inline" style="padding-top: 20px;">
                                            <label class="m-radio">

                                                <input type="radio"  name="cleaned" value="1">cleaned
                                                <input type="hidden" name="cleaningprice" value="{{$setting->cleaningprice}}">
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="cleaned" value="0">Notcleaned
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                <div class="col-md-4 addition_type" >
                                    <div class="m-form__group form-group">
                                        <label for="">cooked   {{$setting->cookingprice}}</label>
                                        <div class="m-radio-inline" style="padding-top: 20px;">
                                            <label class="m-radio">
                                                <input type="radio"  name="cooked" value="1">cooked    
                                                <input type="hidden" name="cookingprice" value="{{$setting->cookingprice}}">
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="cooked" value="0">Notcooked
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                    <button class="btn btn-light">
                        <a href="{{route('cart.index')}}" class="btn btn-secondary">
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
    function display(input) {
        if (input.files && input.files[0]) {
            $('.flag-img').show();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#flag')
                    .attr('src', e.target.result)
                    .width(50);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
