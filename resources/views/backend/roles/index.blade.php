@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-check icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Roles</div>
        </div>
        <div class="page-title-actions">
            <a href="{{ route('app.roles.create') }}" class="btn-shadow mr-3 btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create Role
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $roles as $key=>$role)
                            <tr>
                            <td class="text-center text-muted">#{{ $key + 1}}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                                @if ( $role->permissions->count() > 0 )
                                    {{ $role->permissions->count() }}
                                @else
                                    <span class="badge badge-danger">No permission found</span>
                                @endif

                            </td>
                            <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('app.roles.edit', $role->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                @if ( $role->deletable==true )
                                <button onclick="deleteData({{ $role->id }})" type="button" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('app.roles.destroy', $role->id) }}" style="display: :none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
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
