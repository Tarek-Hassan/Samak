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

                <form class="forms-sample col-md-9" action="{{ route('advrtisment.update',[$data->id]) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">
                        <label for="exampleInputName1">titleAr</label>
                        <input type="text" class="form-control" name="titleAr" value="{{ old('titleAr', $data['titleAr']??'') }}"
                               id="exampleInputName1"
                               placeholder="titleAr">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">titleEn</label>
                        <input type="text" class="form-control" name="titleEn" value="{{ old('titleEn', $data['titleEn']??'') }}"
                               id="exampleInputName1"
                               placeholder="titleEn">
                    </div>

                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">descriptionAr</label>
                                                <textarea name="descriptionAr"
                                                          class="summernote"
                                                         >{{ old('descriptionAr',$data['descriptionAr']) }}</textarea>
                                            </div>
                    <div class="form-group m-form__group">
                                                <label
                                                    for="exampleInputPassword1">descriptionEn</label>
                                                <textarea name="descriptionEn"
                                                          class="summernote"
                                                         >{{ old('descriptionEn',$data['descriptionEn']) }}</textarea>
                                            </div>







                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">{{ __('general.submit') }}</button>
                        <button class="btn btn-light">
                            <a href="{{route('advrtisment.index')}}"
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



