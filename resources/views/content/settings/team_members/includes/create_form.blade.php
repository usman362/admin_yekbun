@php
    $permissions = App\Models\Permission::all();
@endphp

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <form id="createForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="showCreateFormModal" value="1">
                <input type="hidden" name="role_id" id="roleIdInput">

                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Warning Alert -->
                    <!-- Styled Warning Box -->
                    <div class="d-flex align-items-center gap-2 mx-auto mb-4 p-3"
                        style="max-width: 546px; background: #f8d3d6; border: 1px solid #f2b2b5; border-radius: 12px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">

                        <!-- Icon -->
                        <img src="{{ asset('assets/svg/svg-dialog/donations/Check Circle.svg') }}" alt="check icon"
                            style="width: 30px; height: 30px; flex-shrink: 0;">

                        <!-- Text (Single Line) -->
                        <div class="text-start" style="font-size: 14px; color: #4b5563; font-weight: 500;">
                            Please Create a Role Before &nbsp;•&nbsp;
                            <span style="color: #ed1c24;">
                                Create an Admin
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                    style="color: #ed1c24; text-decoration: underline;">"Create Role"</a>
                            </span>
                        </div>
                    </div>




                    <!-- Dropzone -->
                    <!-- Dropzone -->
                    <div class="text-center mb-4">
                        <div class="dropzone needsclick mx-auto" id="dropzone-img-create">
                            <img src="{{ asset('assets/img/Upload new images-Videos.svg') }}" class="avatar-preview"
                                id="uploadIcon" alt="Avatar">
                            <input type="file" name="image" id="fileInput" accept="image/*" class="d-none">
                            <div class="dz-message needsclick d-none">Drop files here or click to upload</div>
                        </div>
                    </div>


                    <!-- Form Fields -->
                    <div class="row g-3">
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
                            <input type="email" id="inputEmail" name="email" class="form-control"
                                autocomplete="new-email">
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="inputPassword">Password</label>
                            <div class="input-group">
                                <input type="password" id="inputPassword" name="password" class="form-control"
                                    autocomplete="new-password">
                                <span class="input-group-text toggle-password" style="cursor: pointer"><i
                                        class="fas fa-eye"></i></span>
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
                                <span class="input-group-text toggle-password" style="cursor: pointer"><i
                                        class="fas fa-eye"></i></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="rolesInput1">Roles</label>
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

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>

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

    .dz-message {
        display: none !important;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropzone = document.getElementById('dropzone-img-create');
        const fileInput = document.getElementById('fileInput');

        dropzone.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploadIcon').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
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