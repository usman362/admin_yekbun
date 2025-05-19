@extends('layouts/layoutMaster')

@section('title', 'Team Members - List')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
@endsection
@php
    $permissions = App\Models\Permission::all();
@endphp

@section('content')
    <script>
        const dropZoneInitFunctions = [];
    </script>
    <div class="d-flex justify-content-between">
        <div>
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Settings /</span> Add / Manage Team Members
            </h4>
        </div>
        <div class="">
            <!-- <a href="{{ route('donations.organizations.create') }}">
                      <button class="btn btn-primary">Add Organization</button>
                    </a> -->
        </div>
    </div>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="m-0">Members List</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bx bx-plus me-0 me-sm-1"></i> Add Member
                </button>
                <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary  ">
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    Add New Role
                </button>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Member</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="avatar avatar-sm me-3"><img
                                                src="{{ $user->image ? asset('storage/' . $user->image) : 'https://www.w3schools.com/howto/img_avatar.png' }}"
                                                alt="Avatar" class="rounded-circle"></div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:void(0)" class="text-body text-truncate">
                                            <span class="fw-semibold">{{ $user->name }}</span>
                                        </a>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{-- {{var_dump($user->roles)}} --}}
                                @if (isset($user->roles))
                                    @foreach ($user->roles as $role)
                                        @if ($role->name === 'Super Admin')
                                            <span class="badge bg-label-primary">{{ $role->name }}</span>
                                        @else
                                            <span class="badge bg-label-dark">{{ $role->name }}</span>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="badge bg-label-warning">Not assigned yet</span>
                                @endif
                            </td>
                            <td>
                                @if ((int) $user->status)
                                    <span class="badge bg-label-success me-1">Active</span>
                                @else
                                    <span class="badge bg-label-secondary me-1">Disabled</span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <!-- Edit -->
                                    <button class="btn btn-sm btn-icon me-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $user->id }}" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                        data-bs-original-title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </button>


                                   @if($user->roles->isNotEmpty())
    <button type="button" class="btn btn-sm btn-icon ms-2" data-bs-toggle="modal"
        data-bs-target="#editUserRolesModal{{ $user->roles->first()->id }}">
        <i class="bx bx-pencil"></i> Edit Roles
    </button>

    @include('content.settings.roles.includes.edit_form', ['role' => $user->roles->first(), 'permissions' => $permissions])
@else
    <span class="badge bg-label-warning">No role assigned</span>
@endif




                                    @if (!$user->is_superadmin)
                                        <!-- Delete -->
                                        <form action="{{ route('settings.team.members.destroy', $user->id) }}"
                                            onsubmit="confirmAction(event, () => event.target.submit())" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-icon ms-4" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                data-bs-original-title="Remove"><i class="bx bx-trash me-1"></i></button>
                                        </form>
                                    @endif
                                </div>
                                <x-modal id="editModal{{ $user->id }}" title="Edit Member" saveBtnText="Update"
                                    saveBtnType="submit" saveBtnForm="editForm{{ $user->id }}" size="md"
                                    :show="old('showEditFormModal' . $user->id) ? true : false">
                                    @include('content.settings.team_members.includes.edit_form')
                                </x-modal>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5"><b>No member found.<b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <style>
        /* Applies to both add and edit modals */
        .modal .modal-content {
            padding-top: 0;
            position: relative;
        }

        .modal .btn-close {
            position: absolute;
            top: 20px;
            right: 10px;
            z-index: 1055;
        }

        .modal .modal-body {
            padding-top: 2.5rem;
            /* space for close button */
        }
    </style>

    <div class="modal fade" id="editUserRolesModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-dialog-centered modal-md">
            <div class="modal-content p-0">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="text-center mb-4">
                        <h3 class="role-title mt-4">Edit Roles for {{ $user->name }}</h3>
                        <p>Select and assign roles to the user</p>
                    </div>

                    <form action="{{ route('settings.team.roles.update', $user->roles->first()->id ?? 0) }}"
                        id="editRoleForm{{ $user->id }}" class="row g-3" method="post">
                        @method('PUT')
                        @csrf
                        <div class="col-12 mb-4">
                            <label class="form-label" for="inputRoleName{{ $user->id }}">Role Name</label>
                            <input type="text" id="inputRoleName{{ $user->id }}" name="name"
                                class="form-control" value="{{ old('name') ?? ($user->roles->first()->name ?? '') }}"
                                placeholder="Enter a role name" tabindex="-1" disabled />


                        </div>

                        <div class="col-12">
                            <h4>Role Permissions</h4>
                            <!-- Permission table -->
                            <div class="table-responsive overflow-hidden">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">Administrator Access <i
                                                    class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Allows a full access to the system"></i></td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input admin-access" type="checkbox"
                                                        id="administratorPermission" />
                                                    <label class="form-check-label" for="administratorPermission">
                                                        Select All
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($permissions->whereNull('parent_id') as $permission)
                                            <tr>
                                                <td class="text-nowrap fw-semibold">
                                                    {{ $permission->label ?? ucfirst(str_replace('_', ' ', $permission->name)) }}
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach ($permissions->where('parent_id', $permission->id) as $childPermission)
                                                            <div class="form-check me-3 me-lg-5">
                                                                {{-- {{dd($user->permission)}} --}}
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="permissions[]"
                                                                    value="{{ $childPermission->name }}"
                                                                    id="permission{{ $childPermission->id }}"
                                                                    {{ \App\Helpers\Helpers::array_in($childPermission->name, $user->permission) ? 'checked' : '' }} />
                                                                <label class="form-check-label"
                                                                    for="permission{{ $childPermission->id }}">
                                                                    {{ $childPermission->label ?? ucfirst(str_replace('_', ' ', str_replace($permission->name . '.', '', $childPermission->name))) }}
                                                                </label>
                                                            </div>
                                                        @break
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($permissions->where('parent_child_id', '1') as $childpermissiontop)
                                            @if ($childpermissiontop->parent_id === $permission->id)
                                                <tr>
                                                    <td class="pl-3">▪
                                                        {{ $childpermissiontop->label ?? ucfirst(str_replace('_', ' ', $childpermissiontop->name)) }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            @foreach ($permissions->where('parent_id', $childpermissiontop->id) as $childPermissionbottom)
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="permissions[]"
                                                                        value="{{ $childPermissionbottom->name }}"
                                                                        id="permission{{ $childPermissionbottom->id }}"
                                                                        {{ \App\Helpers\Helpers::array_in($childPermissionbottom->name, $user->permission) ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="permission{{ $childPermissionbottom->id }}">
                                                                        {{ $childPermissionbottom->label ?? ucfirst(str_replace('_', ' ', str_replace($permission->name . '.', '', $childPermissionbottom->name))) }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                </tr>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--/ Basic Bootstrap Table -->
@include('content.settings.roles.includes.create_form')
@include('content.settings.roles.includes.edit_form')

<x-modal id="createModal" saveBtnText="Create" saveBtnType="submit" saveBtnForm="createForm" size="md"
    :show="old('showCreateFormModal') ? true : false">
    @include('content.settings.team_members.includes.create_form')
</x-modal>
@endsection







@section('page-script')
<script>
    function confirmAction(event, callback) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                callback();
            }
        });
    }
</script>
<script>
    const rolesList = [
        @foreach ($roles as $role)
            {
                value: {{ $role->id }},
                name: '{{ $role->name }}',
            },
        @endforeach
    ];

    function tagTemplate(tagData) {
        return `
    <tag title="${tagData.title || tagData.email}"
      contenteditable='false'
      spellcheck='false'
      tabIndex="-1"
      class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ''}"
      ${this.getAttributes(tagData)}
    >
      <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
      <div>
        <span class='tagify__tag-text'>${tagData.name}</span>
      </div>
    </tag>
  `;
    }

    function suggestionItemTemplate(tagData) {
        return `
    <div ${this.getAttributes(tagData)}
      class='tagify__dropdown__item align-items-center ${tagData.class ? tagData.class : ''}'
      tabindex="0"
      role="option"
    ><strong>${tagData.name}</strong></div>
  `;
    }
</script>
<script>
    function drpzone_init() {
        dropZoneInitFunctions.forEach(callback => callback());
    }
</script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection
