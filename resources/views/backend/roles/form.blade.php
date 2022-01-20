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
            <a href="{{ route('app.roles.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-circle-left"></i>
                Back to list
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <form method="POST" action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}">
                @csrf
                @isset($role)
                    @method('PUT')
                @endisset
                <div class="card-body">
                    <div class="card-title">
                        <h5>Manage Roles</h5>
                    </div>
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name??old('email') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <strong>Manage permissions for role</strong>
                        <p class="p-2">
                            @error('permissions')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-all">
                            <label class="custom-control-label" for="select-all">Select All</label>
                        </div>
                    </div>
                    @forelse ($modules->chunk(2) as $key=>$chunks )
                        <div class="form-row">
                            @foreach ($chunks as $key=>$module)
                                <div class="col">
                                    <h5>Module: {{ $module->name }}</h5>
                                    @foreach ($module->permissions as $key=>$permission)
                                        <div class="md-3 ml-4">
                                            <div class="custom-control custom-checkbox mb-2">
                                                <input type="checkbox"
                                                class="custom-control-input"
                                                id="permission-{{ $permission->id }}"
                                                name="permissions[]"
                                                value="{{$permission->id}}"
                                                @isset($role)
                                                    @foreach ($role->permissions as $rPermission )
                                                        {{$permission->id == $rPermission->id ? 'checked':''}}
                                                    @endforeach
                                                @endisset
                                                >
                                                <label for="permission-{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="row">
                            <div class="col text-center">
                                <strong>NO module found.</strong>
                            </div>
                        </div>
                    @endforelse
                    <button type="submit" class="btn btn-primary">
                        @isset($role)
                            <i class="fas fa-arrow-circle-up"></i>
                            Update
                        @else
                            <i class="fas fa-plus-circle"></i>
                            Create
                        @endisset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        console.log('Sunny');
        // Listen for click on toggle checkbox

        $('#select-all').click(function(event){
                $('#select-all').click(function(event){
            if(this.checked){
                // Iterate  each checkbox
                $(':checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $(':checkbox').each(function(){
                    this.checked = false
                });
            }
            });
        });
    </script>
@endpush
