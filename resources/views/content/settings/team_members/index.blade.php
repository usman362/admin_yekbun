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
                        <th>Permissions</th>
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
                                @php
                                    $permissions = $user->roles->flatMap->permissions->pluck('name')->unique();
                                @endphp

                                @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $permission)
                                        <span class="badge bg-label-info">{{ $permission }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-label-warning">No permissions</span>
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


                                    @if ($user->roles->isNotEmpty())
                                        <button type="button" class="btn btn-sm btn-icon ms-2" data-bs-toggle="modal"
                                            data-bs-target="#editUserRolesModal{{ $user->roles->first()->id }}">
                                            <i class="bx bx-pencil"></i> Edit Roles
                                        </button>

                                        @include('content.settings.roles.includes.edit_form', [
                                            'role' => $user->roles->first(),
                                            'permissions' => $permissions,
                                        ])
                                    @else
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
