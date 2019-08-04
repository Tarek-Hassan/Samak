@if($data->booking_id)
    @php($bookingId = $data->booking_id )
@elseif($data->ticketId)
    @php($bookingId = $data->ticketId )
@elseif($data->record_locator)
    @php($bookingId = $data->record_locator )
@elseif($data->pnr_pin)
    @php($bookingId = $data->pnr_pin )
@endif
@php($id = 'id'.(string)$bookingId)
@if($data->type == 1)
    <span class="dropdown">
        <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
           data-toggle="dropdown" aria-expanded="false">
          <i class="la la-ellipsis-h"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">
            <a href="{{ route(str_replace('.index','',request()->route()->getName()).'.edit',[$data->id]) }}"
               class="dropdown-item btn"
               title="{{__('general::admin.edit_book')}}"><i class="la la-edit"></i>{{__('general::admin.edit_book')}}
            </a>
            <button class="dropdown-item btn" type="button" data-toggle="modal" data-target="#d{{$id}}"><i
                        class="la la-remove"></i>{{__('general::admin.cancel_book')}}</button>
        </div>
    </span>
    {{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$id}}">Cancel</button>--}}
    <!--begin::Modal-->
    <div class="modal fade" id="d{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="margin-top: 25%;">
                <form action="{{route(str_replace('.index','',request()->route()->getName()).'.cancel')}}"
                      method="post">
                    @csrf
                    <input type="hidden" name="booking_id" value="{{$bookingId}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel Booking #{{$bookingId}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-form__group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleSelect1">
                                        {{ __('general::admin.cancel_fee') }}
                                    </label>
                                    <input type="number" step="0.01" name="cancel_fee"
                                           class="form-control m-input m-input--air">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleSelect1">
                                        {{ __('general::admin.cancel_charge') }}
                                    </label>
                                    <input type="number" step="0.01" name="cancel_charge"
                                           class="form-control m-input m-input--air">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleSelect1">
                                        {{ __('general::admin.cancel_travel_agent_charge') }}
                                    </label>
                                    <input type="number" step="0.01" name="cancel_travel_agent_charge"
                                           class="form-control m-input m-input--air">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{$data->user_id}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Cancel Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->
@endif
