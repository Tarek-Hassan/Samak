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

            <form class="forms-sample col-md-9" action="{{ route('manageusers.store') }}" method="post"
                enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInputName1"
                        placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        id="exampleInputName1" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control " name="password" id="password" placeholder="Password">

                </div>
                <div class="form-group">
                    <label for="password-confirm">ConfirmPassword</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                        placeholder="ConfirmPassword">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">phone</label>
                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                        id="exampleInputphone1" placeholder="phone">
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-md-10">
                        <label for="exampleSelect1">
                            Role
                        </label>
                        <select class="form-control m-bootstrap-select m_selectpicker" required name="role">
                            <option value="admin">admin</option>
                            <option value="user">user </option>
                            <option value="owner">owner</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">country</label>
                    <input type="text" class="form-control" name="country" value="{{ old('country') }}"
                        id="exampleInputcountry1" placeholder="country">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">city</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="exampleInputcity1"
                        placeholder="city">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">street</label>
                    <input type="text" class="form-control" name="street" value="{{ old('street') }}"
                        id="exampleInputstreet1" placeholder="street">
                </div>




                <div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Image</label>
                        <div></div>
                        <div class="custom-file">
                            <input onchange="display(this);" type="file" class="custom-file-input" id="customFile"
                                name="avatar">
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
                        <a href="{{route('manageusers.index')}}" class="btn btn-secondary">
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
