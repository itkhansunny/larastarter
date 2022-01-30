@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Pages</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('app.pages.create') }}" class="btn-shadow mr-3 btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create Page
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th>
                            <th class="text-center">URL</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Last Modified</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pages as $key=>$page)
                            <tr>
                            <td class="text-center text-muted">#{{ $key + 1}}</td>
                            <td>
                                {{ $page->title }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('page',$page->slug) }}"> {{ $page->slug }} </a>
                            </td>
                            <td class="text-center">
                                @if ( $page->status == true )
                                    <span class="badge badge-info">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $page->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('app.pages.edit', $page->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <button onclick="deleteData({{ $page->id }})" type="button" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $page->id }}" method="POST" action="{{ route('app.pages.destroy', $page->id) }}" style="display: :none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
