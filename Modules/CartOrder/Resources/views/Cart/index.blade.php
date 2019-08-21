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

            </div>
            <!--  -->
            <!--begin::Portlet-->

            <div class="m-portlet__body">
                <!--begin::Section-->


                <div class="m-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>{{ __('general.quantity') }}</th>
                                    <th>{{ __('general.price') }}</th>
                                    <th>{{ __('general.size') }}</th>
                                    <th>{{ __('general.cooked') }}</th>
                                    <th>{{ __('general.cutting') }}</th>
                                    <th>{{ __('general.cleaned') }}</th>
                                    <th>{{ __('general.categorydetailsname') }}</th>
                                    <th>{{ __('general.username') }}</th>
                                    <th>{{ __('admin.operation') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $value)
                                <tr>
                                    <td>
                                        {{$value->id}}
                                    </td>
                                    <td>
                                        {{$value->quantity}}
                                    </td>
                                    <td>
                                        {{$value->price}}
                                    </td>
                                    <td>

                                        {{$value->size}}
                                    </td>
                                    <td>

                                        {{$value->cooked}}
                                    </td>
                                    <td>

                                        {{$value->cutting}}
                                    </td>
                                    <td>

                                        {{$value->cleaned}}
                                    </td>
                                    <td>
                                        {{$value->categoryDetails->titleEn}}
                                    </td>
                                    <td>

                                        {{$value->user->name}}
                                    </td>

                                    <td>
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

                                            <form action="{{route('cart.destroy',$value->id)}}" method="post">
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
<!-- button to testsend data fromCart to the orders   -->
                <!-- <div class="m-portlet__head-tools">


                            <button onclick="window.location='{{ route('order.create') }}'"
                                class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>{{ __('admin.order') }}</span>
                                </span>
                            </button>

                </div> -->

            <!--  -->
        </div>
    </div>
</div>
</div>


@endsection
