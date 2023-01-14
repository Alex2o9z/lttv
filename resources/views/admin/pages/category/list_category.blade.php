@extends('admin.layouts.master')
@php
	$title = __('lang.listcategory');
	session()->put('index', 'listcategory');
@endphp
@section('title',$title)

@section('content')
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Category</h2>

						<span class="main__title-stat">
							{{session('total')}} Total</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sort by:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Date created">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<li>Date created</li>
									<li>A-Z</li>
									<li>ID</li>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="#" class="main__title-form">
								<input type="text" placeholder="Find category...">
								<button type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- Message -->
				<div class="col-12 pb-2">
					@if(session('message') == 'delete success')
						<h3 class="text-green">Deleted success!</h3>
						<!-- sửa lang -->
						@php session('message',null); @endphp
					@endif
					@if(session('message') == 'update status success')
						<h3 class="text-green">Update status success!</h3>
						<!-- sửa lang -->
						@php session('message',null); @endphp
					@endif
				</div>

				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>TITLE</th>
									<th>STATUS</th>
									<th>ACTIONS</th>
									<th>CREATED DATE</th>
									<th>LAST UPDATE</th>
								</tr>
							</thead>

							<tbody>
							@if(session('category'))
								@foreach(session('category') as $key => $category)
								<tr>
									<td>
										<div class="main__table-text">{{$category->category_id}}</div>
									</td>
									<td>
										<div class="main__table-text">{{$category->title}}</div>
									</td>
									<td>
										@if($category->status == 0)
										<div class="main__table-text main__table-text--red">Hidden</div> @endif

										@if($category->status == 1)
										<div class="main__table-text main__table-text--green">Visible</div> @endif
									</td>
									<td>
										<div class="main__table-btns">
											<a href="#modal-status-{{$category->category_id}}" class="main__table-btn main__table-btn--banned open-modal">
												<i class="icon ion-ios-lock"></i>
											</a>
											<a href="#modal-view-{{$category->category_id}}" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>
											<a href="{{url('admin/category/edit-category/'.$category->category_id)}}" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i>
											</a>
											<a href="#modal-delete-{{$category->category_id}}" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
										</div>
									</td>
									<td>
										<div class="main__table-text">{{$category->created_at}}</div>
									</td>
									<td>
										<div class="main__table-text">{{$category->updated_at}}</div>
									</td>
								</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
				</div>
				<!-- end users -->

				<!-- paginator -->
				<div class="col-12">
					<div class="paginator-wrap">
						<span>
						@php $count = 0; @endphp
						@if(session('category'))
							@foreach(session('category') as $key => $category)
								@php $count++; @endphp
							@endforeach
						@endif
						{{$count}}
						@php $count = 0; @endphp
						 from {{session('total')}}
						</span>

						<ul class="paginator">
							{{ session('category')->links() }}
							<!-- <li class="paginator__item paginator__item--prev">
								<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
							</li>
							<li class="paginator__item"><a href="#">1</a></li>
							<li class="paginator__item paginator__item--active"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item"><a href="#">4</a></li>
							<li class="paginator__item paginator__item--next">
								<a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
							</li> -->
						</ul>
					</div>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</main>
	<!-- end main content -->
@if(session('category'))
	@foreach(session('category') as $key => $category)

	<!-- modal view -->
	<div id="modal-view-{{$category->category_id}}" class="zoom-anim-dialog mfp-hide modal modal--view">
		<div class="comments__text">
			<img src="{{asset('public/storage/uploads/category/'.$category->image)}}" width="670px">
		</div>
		<div class="comments__autor">
			<!-- <img class="comments__avatar" src="img/user.svg" alt=""> -->
			<span class="comments__name">Title: {{$category->title}}</span>
			<span class="comments__time">Created at: {{$category->created_at}}</span>
			<span class="comments__time">Lastest update: {{$category->updated_at}}</span>
		</div>
		<p class="comments__text">{{$category->desc}}</p>
		<!-- <img src="{{asset('public/storage/uploads/category/'.$category->image)}}" width="100px"> -->
		<div class="comments__actions">
			<div class="comments__rate">
				@if($category->status == 1)
					<span class="text-green"><i class="icon ion-md-thumbs-up"></i>Visible</span>
				@else
					<span class="text-red"><i class="icon ion-md-thumbs-down"></i>Hidden</span>
				@endif
			</div>
		</div>
	</div>
	<!-- end modal view -->

	<!-- modal status -->
	<div id="modal-status-{{$category->category_id}}" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Status change for category<br>"{{$category->title}}"</h6>

		<p class="modal__text">Are you sure about immediately change status?</p>

		<div class="modal__btns">
			<a href="{{url('admin/category/update-category-status/'.$category->category_id)}}" class="modal__btn modal__btn--apply" type="button">Apply</a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal status -->

	<!-- modal delete -->
	<div id="modal-delete-{{$category->category_id}}" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Delete category<br>"{{$category->title}}"</h6>

		<p class="modal__text">Are you sure to permanently delete all of this item?</p>

		<div class="modal__btns">
			<a href="{{url('admin/category/destroy-category/'.$category->category_id)}}" class="modal__btn modal__btn--apply" type="button">Delete</a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->
	@endforeach
	{{session()->put('category',null);}}
@endif
@endsection