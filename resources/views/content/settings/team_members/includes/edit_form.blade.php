<style>
    .edit-form .dropzone {
        display: flex;
        flex-wrap: wrap;
    }

    .edit-form .dropzone .dz-message {
        width: 100%;
    }

    .dz-filename {
        display: none !important;
    }

    .dz-preview.dz-file-preview {
        display: flex !important;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 100%;
        margin: 10px auto;
    }

    .dz-thumbnail {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ccc;
        transition: 0.3s ease;
    }

    .dz-thumbnail:hover {
        border-color: #007bff;
    }

    .dz-message {
        cursor: pointer;
    }
</style>

<form id="editForm{{ $user->id }}" action="{{ route('settings.team.members.update', $user->id) }}" method="post" enctype="multipart/form-data" class="edit-form">
    @method('PUT')
    @csrf
    <div class="hidden-inputs">
        <input type="hidden" name="image" value="{{ $user->image }}" data-path="{{ $user->image }}">
    </div>
    <input type="hidden" name="showEditFormModal{{ $user->id }}" value="1">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">

                <!-- Avatar Image Upload -->
              <div class="card mb-3 mb-lg-5" id="generalDiv">

                    <div class="profile-cover">
                        
                    </div>
                    <style>
                        .card>.profile-cover,
                        .card>.profile-cover .profile-cover-img,
                        .card>.profile-cover .profile-cover-img-wrapper {
                            border-bottom-right-radius: 0;
                            border-bottom-left-radius: 0;
                        }

                        @media (min-width: 992px) {
                            .profile-cover {
                                height: 1rem;
                            }
                        }

                        .profile-cover {
                            position: relative;
                            height: 7.5rem;
                            padding: 1.75rem 2rem;
                            border-radius: 0.75rem;
                        }

                        .profile-cover-img-wrapper {
                            height: 10rem;
                        }

                        .profile-cover-img-wrapper {
                            position: absolute;
                            top: 0;
                            inset-inline-end: 0;
                            inset-inline-start: 0;
                            height: 7.5rem;
                            background-color: #e7eaf3;
                            border-radius: 0.75rem;
                        }

                        .avatar:not(img) {
                            background-color: #fff;
                        }

                        .profile-cover-avatar {
                            display: -ms-flexbox;
                            display: flex;
                            margin: -6.3rem auto 0.5rem;
                        }

                        .avatar-uploader {
                            cursor: pointer;
                            display: inline-block;
                            transition: .2s;
                            margin-bottom: 0;
                        }

                        .avatar-xxl {
                            width: 7.875rem;
                            height: 7.875rem;
                        }

                        .avatar-border-lg {
                            border: 0.1875rem solid #fff;
                        }

                        .avatar-circle {
                            border-radius: 50% !important;
                        }

                        .avatar {
                            position: relative;
                            display: inline-block;
                            /*width: 7.625rem;*/
                            /*height: 7.625rem;*/
                            border-radius: 0.3125rem;
                        }

                        label {
                            color: #334257;
                            text-transform: capitalize;
                        }

                        label {
                            display: inline-block;
                            margin-bottom: 0.5rem;
                        }

                        .avatar-circle .avatar-img,
                        .avatar-circle .avatar-initials {
                            border-radius: 50%;
                        }

                        .avatar-img {
                            display: block;
                            max-width: 100%;
                            height: 100%;
                            -o-object-fit: cover;
                            object-fit: cover;
                            pointer-events: none;
                            border-radius: 0.3125rem;
                        }

                        .avatar-uploader-input {
                            position: absolute;
                            top: 0;
                            inset-inline-end: 0;
                            inset-inline-start: 0;
                            z-index: -1;
                            opacity: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(19, 33, 68, .25);
                            border-radius: 50%;
                            transition: .2s;
                        }

                        .avatar-uploader-trigger {
                            position: absolute;
                            bottom: 0;
                            inset-inline-end: 0;
                            cursor: pointer;
                            border-radius: 50%;
                        }

                        .avatar-xxl .avatar-uploader-icon {
                            width: 2.1875rem;
                            height: 2.1875rem;
                        }

                        .shadow-soft {
                            box-shadow: 0 3px 6px 0 rgba(140, 152, 164, .25) !important;
                        }

                        .avatar-uploader-icon {
                            display: -ms-inline-flexbox;
                            display: inline-flex;
                            -ms-flex-negative: 0;
                            flex-shrink: 0;
                            -ms-flex-pack: center;
                            justify-content: center;
                            -ms-flex-align: center;
                            align-items: center;
                            color: #677788;
                            background-color: #fff;
                            border-radius: 50%;
                            transition: .2s;
                        }

                        .field-icon {
                            float: right;
                            margin-right    : 12px;
                            margin-top: -25px;
                            position: relative;
                            z-index: 2;
                            cursor: pointer;
                        }
                    </style>

                    <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                        for="avatarUploader">
                        <img id="viewer"
                            onerror="this.src='https://efood-admin.6amtech.com/public/assets/admin/img/160x160/img1.jpg'"
                            class="avatar-img" src="{{ asset('storage/' . auth()->user()->image) }}" alt="Image">
                        <input type="file" name="image" class="js-file-attach avatar-uploader-input" id="customFileEg1"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <label class="avatar-uploader-trigger" for="customFileEg1">
                            <i class="avatar-uploader-icon fa fa-pencil shadow-soft"></i>
                        </label>
                    </label>
                   
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label" for="inputName{{ $user->id }}">Name</label>
                    <input type="text" id="inputName{{ $user->id }}" name="name" class="form-control" value="{{ old('name') ?? $user->name }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label" for="inputEmail{{ $user->id }}">Email</label>
                    <input type="text" id="inputEmail{{ $user->id }}" name="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label class="form-label" for="inputPassword">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword" name="password" class="form-control" autocomplete="new-password">
                        <span class="input-group-text toggle-password1" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="col-md-6">
                    <label class="form-label" for="inputPasswordConfirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control">
                        <span class="input-group-text toggle-password1" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Roles -->
                <div class="col-md-6">
                    <label for="rolesInput{{ $user->id }}" class="form-label">Roles</label>
                    <select class="form-control" name="roles" id="rolesInput2">
                        @foreach($roles as $role)
                            @if ($role->name !== 'Super Admin')
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label" for="imageInput{{ $user->id }}">Status</label>
                    <select class="form-control" name="status" id="imageInput{{ $user->id }}">
                        <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$user->status ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle password visibility
        document.querySelectorAll('.toggle-password1').forEach(function (element) {
            element.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });

        // Avatar upload and preview
        const dropzone = document.getElementById('avatarDropzone{{ $user->id }}');
        const fileInput = document.getElementById('avatarInput{{ $user->id }}');
        const preview = document.getElementById('avatarPreview{{ $user->id }}');

        dropzone.addEventListener('click', function () {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
