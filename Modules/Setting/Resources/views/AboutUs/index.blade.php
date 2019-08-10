
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
                                <button onclick="window.location='{{ route('aboutus.create') }}'"
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


								<th>BodyAr</th>
								<th>bodyEn</th>
                                <th>Operation</th>

                        </tr>
                        </thead>

										<tbody>
                                        @foreach($data as $value)
											<tr>
												<td>
													{{$value->id}}
												</td>
												<td>
                                                {{$value->bodyAr}}
												</td>
												<td>
                                                {{$value->bodyEn}}
												</td>
												<td>
                                                <a href="aboutus/{{$value->id}}/edit"><button type="button" class="btn btn-primary" >Edite</button></a>
							                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" >Delete</button>
												</td>

											</tr>
                                            <div class="modal model-danger fade" id="delete" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
					      </div>

					       <form action="{{route('aboutus.destroy',$value->id)}}" method="post">
					        <div class="modal-body">
					         {{method_field('delete')}}
					     	 {{csrf_field()}}
			          			<div>
			            			<div class="box-body">
			            			<p class="text-center">Are u sure want to delete?</p>
			          					<!-- <input type="hidden" name="post_id" id="post_id" value=""> -->

			            			</div>
			          			</div>
					      	</div>
					      		<div class="modal-footer">
					        	<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">No, cancel</button>
					        	<button type="submit" class="btn btn-success">Yes, Delete</button>
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

