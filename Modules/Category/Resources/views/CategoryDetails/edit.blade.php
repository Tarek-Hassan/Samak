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

            <form class="forms-sample col-md-9" action="{{ route('categorydetails.update',[$data->id]) }}" method="post"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- ['titleAr','titleEn','medium','large','small','discount','quantity','user_id','category_id' -->
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="rate" value="3">
                <div class="form-group">

                    <label for="exampleInputName1">titleAr</label>
                    <input type="text" class="form-control" name="titleAr" value="{{ old('titleAr', $data['titleAr']??'') }}"
                        id="exampleInputName1" placeholder="titleAr">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">titleEn</label>
                    <input type="text" class="form-control" name="titleEn" value="{{ old('titleEn', $data['titleEn']??'') }}"
                        id="exampleInputName1" placeholder="titleEn">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Quantity</label>
                    <input type="number" class="form-control" name="quantity"
                        value="{{ old('quantity', $data['quantity']??'') }}" id="exampleInputName1"
                        placeholder="quantity">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">large</label>
                    <input type="number" class="form-control" name="large"
                        value="{{ old('large', $data['large']??'') }}" id="exampleInputName1" placeholder="large">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">medium</label>
                    <input type="number" class="form-control" name="medium"
                        value="{{ old('medium', $data['medium']??'') }}" id="exampleInputName1" placeholder="medium">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">small</label>
                    <input type="number" class="form-control" name="small"
                        value="{{ old('small', $data['small']??'') }}" id="exampleInputName1" placeholder="small">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">discount</label>
                    <input type="number" class="form-control" name="discount"
                        value="{{ old('discount', $data['discount']??'') }}" id="exampleInputName1"
                        placeholder="discount">
                </div>

                <div class="form-group m-form__group ">

                    <label for="exampleSelect1">
                        categories
                    </label>
                    <select class="form-control m-bootstrap-select m_selectpicker" name="category_id"
                        data-live-search="true">
                        @foreach($categories as $category)
                        <option {{ $data->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->category_nameAr }} => {{ $category->category_nameEn }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Image</label>

                        <div class="custom-file">
                            <input  type="file" class="custom-file-input" id="customFile"
                                name="image[]" multiple>
                            <label class="custom-file-label" for="customFile">Choose</label>
                        </div>
                    </div>
                    <div id="image_preview"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">
                        <a href="{{route('categorydetails.index')}}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </button>
                </div>


            </form>

        </div>

    </div>
</div>

@endsection
@section('script')


        <script type="text/javascript">
            $("#customFile").change(function () {

                $('#image_preview').html("");

                var total_file = document.getElementById("customFile").files.length;

                for (var i = 0; i < total_file; i++)

                {

                    $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

                }

            });


        </script>
@endsection
@section('styles')
    <style type="text/css">
        input[type=file] {

            display: inline;

        }

        #image_preview {



            padding: 10px;

        }

        #image_preview img {

            width: 50px;

            padding: 5px;

        }

    </style>
@endsection

