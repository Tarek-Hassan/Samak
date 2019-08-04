<form method="post"
      action="{{ route('tbo-city.store') }}">
    @csrf
    <input class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air" value="Refresh" type="submit">
    <input value="{{$data->code}},{{$data->name}}" name="country" type="hidden">
    <input value="{{$data->id}}" name="id" type="hidden">
</form>
