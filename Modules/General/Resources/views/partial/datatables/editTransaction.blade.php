@if($data->addition_type == 2)
<a href="{{ route(str_replace('.index','',request()->route()->getName()).'.edit',[$data->id]) }}"
   class="m-portlet__nav-link btn m-btn m-btn--hover-metal m-btn--icon-only m-btn--pill" title="{{__('general::admin.put_as_a_deposit')}}">
    <i class="la la-edit" style="margin-bottom: 3%;"></i>{{__('general::admin.put_as_a_deposit')}}</a>
@endif