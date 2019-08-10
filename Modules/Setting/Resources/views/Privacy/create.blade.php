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

                <form class="forms-sample col-md-9" action="{{ route('privacy.store') }}" method="post" enctype="multipart/form-data">

                    @csrf


                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">DescriptionAr</label>
                                                <textarea name="bodyAr"
                                                          class="summernote"
                                                         >{{ old('bodyAr') }}</textarea>
                                            </div>

                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">DescriptionEN</label>
                                                <textarea name="bodyEn"
                                                          class="summernote"
                                                         >{{ old('bodyEn') }}</textarea>
                                            </div>




                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">
                            <a href="{{route('privacy.index')}}"
                               class="btn btn-secondary">
                               Cancel
                            </a>
                        </button>
                    </div>


                </form>

            </div>

        </div>
    </div>

@endsection



