<style>
    #dropzone-img-create {
        border: 2px dashed #ccc;
        transition: all 0.3s;
        cursor: pointer;
        text-align: center;
        padding: 20px;
        position: relative;
    }

    #dropzone-img-create:hover {
        border-color: #666;
        background-color: #f8f9fa;
    }

    #dropzone-img-create.dz-drag-hover {
        border-color: #2196f3;
        background-color: #e3f2fd;
    }

    .avatar-preview {
        border-radius: 50%;
        object-fit: cover;
        width: 120px;
        height: 120px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .dz-preview {
        display: inline-block;
        margin-top: 10px;
    }

    .dz-image img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
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
                <!-- Image Upload -->
                <div class="col-12">
                    <div class="dropzone needsclick" id="dropzone-img-create">
                        <img src="{{ asset('assets/img/Upload new images-Videos.svg') }}" class="avatar-preview" id="uploadIcon" alt="Avatar">
                        <div class="dz-message needsclick d-none">Drop files here or click to upload</div>
                        <div class="hidden-inputs"></div>

                    </div>
                </div>

                <!-- Form Inputs -->
                <div class="col-md-6">
                    <label class="form-label" for="inputName">Name - Lastname</label>
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

<!-- Password Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-password').forEach(function (element) {
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

<!-- Dropzone Logic -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
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
            clickable: '#uploadIcon', // clicking on icon opens file selector
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            maxFiles: 1,
            acceptedFiles: 'image/*',
            sending: function(file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function(file, response) {
                const defaultAvatar = document.querySelector('.avatar-preview');
                if (defaultAvatar) defaultAvatar.style.display = 'none';

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                    file.previewElement.dataset.path = response.path;

                    const hiddenInputsContainer = document.querySelector('#createForm .hidden-inputs');
                    hiddenInputsContainer.innerHTML = `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;

                    document.querySelector('#dropzone-img-create').appendChild(file.previewElement);
                }
            },
            removedfile: function(file) {
                const hiddenInputsContainer = document.querySelector('#createForm .hidden-inputs');
                const hiddenInput = hiddenInputsContainer.querySelector(`input[data-path="${file.previewElement.dataset.path}"]`);
                if (hiddenInput) hiddenInput.remove();

                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                const defaultAvatar = document.querySelector('.avatar-preview');
                if (defaultAvatar) defaultAvatar.style.display = 'inline-block';

                $.ajax({
                    url: '{{ route('settings.user.delete-img', 0) }}',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        path: file.previewElement.dataset.path
                    },
                    success: function() {}
                });

                return this._updateMaxFilesReachedClass();
            }
        });
    });
</script>
