@extends('general::layouts.admin')

@section('title',__('admin.admins'))

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ __('admin.admins') }}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button onclick="window.location='{{ route('categorydetails.create') }}'"
                                class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>{{ __('admin.add') }}</span>
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  -->
            <!--begin::Portlet-->
            <div class="m-portlet">

                <div class="m-portlet__body">
                    <!--begin::Section-->


                    <div class="m-section__content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>{{ __('general.titleAr') }}</th>
                                        <th>{{ __('general.titleEn') }}</th>
                                        <th>{{ __('general.quantity') }}</th>
                                        <th>{{ __('general.LargePrice') }}</th>
                                        <th>{{ __('general.MediumPrice') }}</th>
                                        <th>{{ __('general.SmallPrice') }}</th>
                                        <th>{{ __('general.discount') }}</th>

                                        <th>{{ __('general.userName') }}</th>
                                        <th>{{ __('general.Product') }}</th>
                                        <th>{{ __('admin.operation') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $value)

                                    <tr>
                                        <td >
                                            {{$value->id}}
                                        </td>
                                        <td>
                                            {{$value->titleAr}}
                                        </td>
                                        <td>
                                            {{$value->titleEn}}
                                        </td>
                                        <td>

                                            {{$value->quantity}}
                                        </td>
                                        <td>
                                            {{$value->large}}
                                        </td>
                                        <td>
                                            {{$value->medium}}
                                        </td>
                                        <td>
                                            {{$value->small}}
                                        </td>


                                        <td>
                                        @if($value->discount==null)
                                            {{'--'}}
                                        @else
                                            {{$value->discount}}
                                        @endif
                                        </td>




                                        {{--   @foreach($images as $image)
                                       <td>
                                            <img src="{{ asset('storage/'.$image->image) }}" id="flag"
                                        style="width:50px;">
                                        @endforeach
                                        </td>
                                        --}}

                                        <td>
                                            {{$value->user->name}}
                                        </td>

                                        <td>
                                            {{$value->category->category_nameEn}}
                                        </td>

                                        <td>

                                            <a href="categorydetails/{{$value->id}}/edit"><button type="button"
                                                    class="btn btn-primary">Edite</button></a>
                                            <a href="cart/{{$value->id}}/edit"><button type="button"
                                                    class="btn">Cart</button></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete">Delete</button>
                                        </td>

                                    </tr>
                                    <div class="modal model-danger fade" id="delete" tabindex="1" role="dialog"
                                        aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                </div>

                                                <form action="{{route('categorydetails.destroy',$value->id)}}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div>
                                                            <div class="box-body">
                                                                <p class="text-center">Are u sure want to delete?</p>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning pull-left"
                                                            data-dismiss="modal">No, cancel</button>
                                                        <button type="submit" class="btn btn-success">Yes,
                                                            Delete</button>
                                                    </div>
                                                </form>
                                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Section-->
                <!--  -->



            </div>
        </div>
    </div>
</div>


@endsection


