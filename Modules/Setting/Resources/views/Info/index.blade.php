
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
                                <button onclick="window.location='{{ route('info.create') }}'"
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
                                <th>phone</th>
                                <th>address</th>
                                <th>website</th>
                                <th>email</th>
                                <th>cuttingprice</th>
                                <th>cleaningprice</th>
                                <th>cookingprice</th>
                                <th>deliveryprice</th>
								<th>UserName</th>
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
                                                {{$value->phone}}
												</td>
												<td>
                                                {{$value->address}}
												</td>
												<td>
                                                {{$value->website}}
												</td>
												<td>
                                                {{$value->email}}
												</td>
												<td>
                                                {{$value->cuttingprice}}
												</td>
												<td>
                                                {{$value->cleaningprice}}
												</td>
												<td>
                                                {{$value->cookingprice}}
												</td>
												<td>
                                                {{$value->deliveryprice}}
												</td>
												<td>
                                                {{$value->users->name}}
												</td>
												<td>
                                                <a href="info/{{$value->id}}/edit"><button type="button" class="btn btn-primary" >Edite</button></a>
							                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" >Delete</button>
												</td>

											</tr>
                                            <div class="modal model-danger fade" id="delete" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
					      </div>

					       <form action="{{route('info.destroy',$value->id)}}" method="post">
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

