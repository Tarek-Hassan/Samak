<a href="{{ route(str_replace('.index','',request()->route()->getName()).'.edit',[$data->id]) }}"
   class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
    <i class="la la-edit"></i>
</a>

<a onclick=" event.preventDefault();
    var r = confirm('are you sure?');
    if (r==true){document.getElementById('delete{{$data->id}}').submit();}"
   data-toggle="tooltip"
   data-original-title="{{ __('admin.delete') }}"
   class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
    <i class="la la-remove"></i>
</a>

<form method="post"
      id="delete{{$data->id}}"
      action="{{ route(str_replace('.index','',request()->route()->getName()).'.destroy',[$data->id]) }}"
      style="display: none;">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>
