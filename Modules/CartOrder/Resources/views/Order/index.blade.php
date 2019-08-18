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
                                        <th>{{ __('general.status') }}</th>
                                        <th>{{ __('general.estimatedtime') }}</th>
                                        <th>{{ __('general.country') }}</th>
                                        <th>{{ __('general.city') }}</th>
                                        <th>{{ __('general.street') }}</th>
                                        <th>{{ __('general.deliveryfee') }}</th>
                                        <th>{{ __('general.paymentMethod') }}</th>
                                        <th>{{ __('general.userName') }}</th>
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
                                            {{$value->status}}
                                        </td>


                                        <td>
                                            {{$value->estimatedtime}}
                                        </td>
                                        <td>

                                            {{$value->country}}
                                        </td>
                                        <td>

                                            {{$value->city}}
                                        </td>
                                        <td>

                                            {{$value->street}}
                                        </td>
                                        <td>

                                            {{$value->deliveryfee}}
                                        </td>
                                        <td>

                                        <a href="orderdetails/{{$value->id}}"><button type="button"
                                                    class="btn btn-primary">{{count($value->orderdetails)}}</button></a>
                                        </td>
                                        <td>

                                            {{$value->payment->paymentmethod}}
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

                                                <form action="{{route('order.destroy',$value->id)}}" method="post">
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
