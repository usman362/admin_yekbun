<style>
    /* Dropzone Container */
    #dropzone-img-create {
        border: 2px dashed #ccc;
        transition: all 0.3s;
        cursor: pointer;
        position: relative;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin: 0 auto;
        background-color: #f8f9fa;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Default Upload Icon */
    #uploadIcon {
        width: 60px;
        height: 60px;
        opacity: 0.7;
        transition: all 0.3s;
        position: relative;
        /* Changed from absolute */
        z-index: 1;
    }

    /* Dropzone Preview Container */
    .dz-preview {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* The actual preview image */
    .dz-image img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 34%;
        left: 28%;
        transform: translate(-50%, -50%);
    }

    /* Hide default dropzone elements */
    .dz-message {
        display: none !important;
    }
</style>
@php
    $permissions = App\Models\Permission::all();
@endphp
<form id="createForm" action="{{ route('settings.team.members.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="hidden-inputs"></div>
    <input type="hidden" name="showCreateFormModal" value="1">
    <div class="row">
        <div class="col-lg-12 mx-auto" style="margin-top: 0; padding-top: 0;">

            <div class="row g-3">

                <div
                    style="
                width: 1100%;
                max-width: 529px;
                height: 90px;
                background: #f8d3d6;
                border-radius: 14px;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                padding: 10px 10px 6px 10px;
                margin-bottom: 16px;
                margin-top: -29px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                border: 1px solid #f2b2b5;
                text-align: center;
            ">
                    <img src="{{ asset('assets/svg/svg-dialog/donations/Check Circle.svg') }}" alt="check icon"
                        style="width: 30px; height: 30px; margin-bottom: 4px;">

                    <div
                        style="font-weight: 600; color: #4b5563; font-size: 16px; display: flex; align-items: center; gap: 6px;">
                        <span style="width: 4px; height: 4px; background-color: #00000066; border-radius: 50%;"></span>
                        Please Create a Role Before
                        <span style="width: 4px; height: 4px; background-color: #00000066; border-radius: 50%;"></span>
                    </div>

                    <div style="font-size: 13px; color: #ed1c24; font-weight: 500; margin-top: 2px;">
                        Create an Admin <a href="#" data-bs-toggle="modal" data-bs-target="#addRoleModal">"Create Role"</a> 
                    </div>
                    
                </div>


                <div class="col-12">
                    <div class="dropzone needsclick" id="dropzone-img-create">
                        <img src="{{ asset('assets/img/Upload new images-Videos.svg') }}" class="avatar-preview"
                            id="uploadIcon" alt="Avatar">
                        <div class="dz-message needsclick d-none">Drop files here or click to upload</div>
                        <div class="hidden-inputs"></div>

                    </div>
                </div>

                <!-- Form Inputs -->
                <div class="col-md-6">
                    <label class="form-label" for="inputName">Name - Lastname</label>
                    <input type="text" id="inputName" name="name" class="form-control"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" autocomplete="new-email">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword" name="password" class="form-control"
                            autocomplete="new-password">
                        <span class="input-group-text toggle-password" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="inputPasswordConfirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation"
                            class="form-control">
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
            @if ($role->name !== 'Super Admin')
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endif
        @endforeach
    </select>
    @error('roles')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
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


@include('content.settings.roles.includes.create_form')






<!-- Password Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-password').forEach(function(element) {
            element.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const previewTemplate = `
            <div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <img data-dz-thumbnail />
                </div>
            </div>`;
    
        const dropzoneCreate = new Dropzone('#dropzone-img-create', {
            url: '{{ route('file.upload') }}',
            previewTemplate: previewTemplate,
            maxFilesize: 100,
            addRemoveLinks: false,
            clickable: '#uploadIcon',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            maxFiles: 1,
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            parallelUploads: 1,
            uploadMultiple: false,
            sending: function(file, xhr, formData) {
                formData.append('folder', 'team_members');
            },
            success: function(file, response) {
                const defaultAvatar = document.querySelector('#uploadIcon');
                if (defaultAvatar) defaultAvatar.style.display = 'none';
    
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                    file.previewElement.dataset.path = response.path;
    
                    // Create or update hidden input
                    let hiddenInput = document.querySelector('input[name="image"]');
                    if (!hiddenInput) {
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'image';
                        document.querySelector('#createForm').appendChild(hiddenInput);
                    }
                    hiddenInput.value = response.path;
                }
            },
            error: function(file, message) {
                alert('Image upload failed: ' + message);
            },
            removedfile: function(file) {
                const defaultAvatar = document.querySelector('#uploadIcon');
                if (defaultAvatar) defaultAvatar.style.display = 'block';
    
                // Remove hidden input if exists
                const hiddenInput = document.querySelector('input[name="image"]');
                if (hiddenInput) hiddenInput.remove();
    
                // Remove preview
                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
    
                // Delete from server if needed
                if (file.previewElement?.dataset?.path) {
                    $.ajax({
                        url: '{{ route('settings.user.delete-img', 0) }}',
                        method: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            path: file.previewElement.dataset.path
                        }
                    });
                }
            }
        });
    
        // Handle form submission
        document.querySelector('#createForm').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('[type="submit"]');
            const form = this;
            
            // If there's a file but not yet uploaded
            if (dropzoneCreate.files.length > 0 && !dropzoneCreate.files[0].status === 'success') {
                e.preventDefault();
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Uploading...';
                
                // Process the queue first
                dropzoneCreate.processQueue();
                
                // When queue completes, submit t ashe form
                dropzoneCreate.on('queuecomplete', function() {
                    form.submit();
                });
            }
        });
    });
    </script>