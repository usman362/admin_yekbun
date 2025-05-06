<style>
    #dropzone-img {
        border: 2px dashed #ccc;
        transition: all 0.3s;
    }

    #dropzone-img:hover {
        border-color: #666;
        background-color: #f8f9fa;
    }

    #dropzone-img.dz-drag-hover {
        border-color: #2196f3;
        background-color: #e3f2fd;
    }

    #dropzone-img .dz-preview {
        margin: 0;
        width: 150px;
        height: 150px;
    }

    #dropzone-img .dz-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
    }

    #dropzone-img .dz-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<form id="createForm" action="{{ route('settings.team.members.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="hidden-inputs"></div>
    <input type="hidden" name="showCreateFormModal" value="1">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-12">
                    <h5 class="card-header">Image</h5>
                    <div class="card-body p-2 text-center">
                        <div class="dropzone needsclick" action="/" id="dropzone-img"
                            style="width: 150px; height: 150px; margin: 0 auto; border-radius: 50%; overflow: hidden;">
                            <div class="dz-message needsclick d-flex justify-content-center align-items-center h-100"
                                style="font-size: 0.8rem;">
                                Drop files here or click to upload
                            </div>
                            <div class="fallback">
                                <input type="file" name="image" id="image" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Name, Email, Password, Roles, Status -->
                <div class="col-md-6">
                    <label class="form-label" for="inputName">Name -Lastname</label>
                    <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" autocomplete="off">
                    @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword" name="password" class="form-control">
                        <span class="input-group-text toggle-password" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputPasswordConfirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control">
                        <span class="input-group-text toggle-password" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="rolesInput1" class="form-label">Roles</label>
                    <select class="form-control" name="roles" id="rolesInput1">
                        <option value="" selected disabled></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="imageInput">Status</label>
                    <select class="form-control" name="status" id="imageInput">
                        <option value="1" selected>Active</option>
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Password visibility toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelectorAll('.toggle-password');
        togglePassword.forEach(function (element) {
            element.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>

<!-- Dropzone Init -->
<script>
    'use strict';
    dropZoneInitFunctions.push(function () {
        const previewTemplate = `
            <div class="dz-preview dz-file-preview text-center">
                <div class="dz-image rounded-circle overflow-hidden mx-auto" style="width: 120px; height: 120px;">
                    <img data-dz-thumbnail style="object-fit: cover; width: 100%; height: 100%;" />
                </div>
                <div class="dz-filename mt-2" data-dz-name></div>
                <div class="dz-size" data-dz-size></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
            </div>`;

        const dropzoneMulti1 = new Dropzone('#dropzone-img', {
            url: '{{ route('file.upload') }}',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFilesize: 100,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            sending: function (file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function (file, response) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.dataset.path = response.path;
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector('.hidden-inputs');
                hiddenInputsContainer.innerHTML += `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;
            },
            removedfile: function (file) {
                const form = file.previewElement.closest('form');
                form.querySelector(`input[data-path="${file.previewElement.dataset.path}"]`)?.remove();
                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                $.ajax({
                    url: '{{ route("file.delete") }}',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: { path: file.previewElement.dataset.path },
                    success: function () {}
                });
                return this._updateMaxFilesReachedClass();
            }
        });
    });
</script>

<!-- Optional: Tagify roles (disabled here) -->
{{-- <script>
    window.addEventListener('load', function () {
        const TagifyRolesListEl = document.querySelector('#rolesInput');
        let rolesList = {!! json_encode($roles) !!}.map(item => ({
            value: item.name,
            name: item.name,
            id: item.id
        }));
        let TagifyRolesList = new Tagify(TagifyRolesListEl, {
            tagTextProp: 'name',
            enforceWhitelist: true,
            skipInvalid: true,
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name']
            },
            whitelist: rolesList
        });
    });
</script> --}}
