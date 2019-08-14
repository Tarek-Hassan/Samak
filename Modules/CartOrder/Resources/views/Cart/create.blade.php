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
                <div class="form-group">
                    <label for="exampleInputName1">cart_nameAr</label>
                    <input type="text" class="form-control" name="cart_nameAr" value="{{ old('cart_nameAr') }}" id="exampleInputName1"
                        placeholder="cart_nameAr">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">cart_nameEn</label>
                    <input type="text" class="form-control" name="cart_nameEn" value="{{ old('cart_nameEn') }}" id="exampleInputName1"
                        placeholder="cart_nameEn">
                </div>


                <div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Image</label>
                        <div></div>
                        <div class="custom-file">
                            <input onchange="display(this);" type="file" class="custom-file-input" id="customFile"
                                name="cart_img">
                            <label class="custom-file-label" for="customFile">Choose</label>
                        </div>
                    </div>

                    <div class="form-group flag-img m-form__group" style="display:none;">
                        <img src="#" id="flag" style="width:50px;">
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
