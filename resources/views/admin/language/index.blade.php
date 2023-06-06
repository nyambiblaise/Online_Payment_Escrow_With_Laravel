@extends('admin.layouts.app')
@section('title')
    @lang('Language')
@endsection
@section('content')

    <div class="card  m-0 m-md-4 my-4 m-md-0">

        <div class="card-footer bg-whitesmoke">
            <a href="{{route('admin.language.create')}}"
               class="btn  btn-primary  float-right mb-3"><i class="fa fa-plus-circle"></i> @lang('Add New')</a>
        </div>



        <div class="card-body">

            <div class="row">
                @foreach($languages as $key => $language)
                <div class="col-md-3">
                    <div class="card shadow border-eee">
                        <div class="card-header bg-white ">
                            <h4 class="py-3 text-primary"><i class="fa fa-folder-open"></i> {{ kebab2Title($language->name) }}
                                @if($language->is_active)
                                    <span class="float-right badge badge-success badge-pill">@lang('Active')</span>
                                @else
                                    <span class="float-right badge badge-warning badge-pill">@lang('Inactive')</span>
                                @endif
                            </h4>
                        </div>



                        <div class="card-footer bg-white border-top-eee d-flex justify-content-between">

                            <a  target="_blank" href="{{route('admin.language.edit',$language) }}" class=" btn-sm btn btn-outline-warning">
                                <i class="fas fa-edit"></i> @lang('Edit')
                            </a>

                            <a target="_blank" class="btn btn-sm btn-outline-primary "
                               href="{{route('admin.language.keywordEdit',$language) }}">
                                <i class="fas fa-code"></i> {{trans('Keywords')}}
                            </a>

                            @if($language->short_name != 'US')
                            <a href="javascript:void(0)"
                                class="btn btn-sm btn-outline-danger deleteBtn"
                                data-toggle="modal"
                                data-toggle="modal" data-target="#deleteModal"
                                data-route="{{route('admin.language.delete',$language)}}">
                                <i class="fas fa-trash"></i>  @lang('Delete')
                            </a>
                            @endif

                        </div>


                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>



    <!-- Primary Header Modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">@lang('Delete Confirmation')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to delete this?')</p>
                </div>

                <form action="" method="post" class="actionForm">
                    @csrf
                    @method('delete')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Delete')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";
        $(document).ready(function () {
            $('.deleteBtn').on('click', function () {
                $('.actionForm').attr('action', $(this).data('route'));
            })
        })

    </script>
@endpush
