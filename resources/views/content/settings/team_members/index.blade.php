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

@section('content')
<script>
    const dropZoneInitFunctions = [];
</script>

<div class="d-flex justify-content-between">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> Add / Manage Team Members
    </h4>
</div>

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0">Members List</h5>
        <div class="d-flex gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bx bx-plus me-0 me-sm-1"></i> Add Member
            </button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                <i class="bx bx-plus me-0 me-sm-1"></i> Add New Role
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
                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://www.w3schools.com/howto/img_avatar.png' }}"
                                         class="rounded-circle" alt="User Image">
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @forelse($user->roles as $role)
                                <span class="badge {{ $role->name === 'Super Admin' ? 'bg-label-primary' : 'bg-label-dark' }}">{{ $role->name }}</span>
                            @empty
                                <span class="badge bg-label-warning">Not assigned yet</span>
                            @endforelse
                        </td>
                        <td>
                            @if ($user->roles->isNotEmpty())
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#permissionsModal{{ $user->id }}">
                                    View Permissions
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="permissionsModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Permissions for {{ $user->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach ($user->roles as $role)
                                                    <h6>{{ $role->name }} Permissions:</h6>
                                                    @if (is_array($role->permission))
                                                        <ul>
                                                            @foreach ($role->permission as $perm)
                                                                <li>{{ $perm }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p><em>No permissions assigned.</em></p>
                                                    @endif
                                                    <hr>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $user->status ? 'bg-label-success' : 'bg-label-secondary' }}">
                                {{ $user->status ? 'Active' : 'Disabled' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                <img src="{{ asset('assets/img/Edit.svg') }}" alt="Edit" style="width: 18px; height: 18px;">
                            </button>

                            @if ($user->roles->isNotEmpty())
                                <button class="btn btn-sm btn-icon" data-bs-toggle="modal"
                                        data-bs-target="#editUserRolesModal{{ $user->roles->first()->id }}">
                                    <img src="{{ asset('assets/img/Update.svg') }}" alt="Edit Roles" style="width: 20px; height: 20px;">
                                </button>

                                @include('content.settings.roles.includes.edit_form', [
                                    'role' => $user->roles->first(),
                                    'permissions' => $permissions,
                                ])
                            @endif

                            @if (!$user->is_superadmin)
                                <form action="{{ route('settings.team.members.destroy', $user->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="confirmAction(event, () => event.target.submit())">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon">
                                        <img src="{{ asset('assets/img/Remove.svg') }}" alt="Delete" style="width: 18px; height: 18px;">
                                    </button>
                                </form>
                            @endif

                            <x-modal id="editModal{{ $user->id }}" title="Edit Member" saveBtnText="Update"
                                     saveBtnType="submit" saveBtnForm="editForm{{ $user->id }}" size="md"
                                     :show="old('showEditFormModal' . $user->id) ? true : false">
                                @include('content.settings.team_members.includes.edit_form')
                            </x-modal>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"><strong>No member found.</strong></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>

@include('content.settings.roles.includes.create_form')
@include('content.settings.roles.includes.edit_form')

 
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
            if (result.value) callback();
        });
    }

    const rolesList = @json($roles->map(fn($role) => ['value' => $role->id, 'name' => $role->name]));

    function tagTemplate(tagData) {
        return `<tag title="${tagData.title || tagData.email}" contenteditable='false'
                class="tagify__tag ${tagData.class || ''}" ${this.getAttributes(tagData)}>
                <x title='' class='tagify__tag__removeBtn' role='button'></x>
                <div><span class='tagify__tag-text'>${tagData.name}</span></div>
            </tag>`;
    }

    function suggestionItemTemplate(tagData) {
        return `<div ${this.getAttributes(tagData)}
                class='tagify__dropdown__item align-items-center ${tagData.class || ''}'
                tabindex="0"><strong>${tagData.name}</strong></div>`;
    }

    function drpzone_init() {
        dropZoneInitFunctions.forEach(callback => callback());
    }
</script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js" onload="drpzone_init()"></script>
@endsection
