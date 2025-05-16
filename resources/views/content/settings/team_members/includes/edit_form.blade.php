<style>
.edit-form .dropzone {
    display: flex;
    flex-wrap: wrap;
}

.edit-form .dropzone .dz-message {
    width: 100%;
    text-align: center;
    font-size: 1.2em;
    padding: 40px 0;
}

.dz-preview .dz-thumbnail {
    width: 150px !important;
    height: 150px !important;
    margin: auto;
    border-radius: 6px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dz-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
</style>

<form id="editForm{{ $user->id }}" action="{{ route('settings.team.members.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="hidden-inputs">
        {{-- Store existing image path --}}
        <input type="hidden" name="image" value="{{ $user->image }}" data-path="{{ $user->image }}">
    </div>
    <input type="hidden" name="showEditFormModal{{ $user->id }}" value="1">

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Image</h5>
                        <div class="card-body">
                            <div class="dropzone needsclick" action="/" id="dropzone-img{{ $user->id }}">
                                <div class="dz-message needsclick">
                                    Drop files here or click to upload
                                </div>
                                <div class="fallback">
                                    <input type="file" name="image" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputName{{ $user->id }}">Name - Lastname</label>
                    <input type="text" id="inputName{{ $user->id }}" name="name" class="form-control" value="{{ old('name') ?? $user->name }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="inputEmail{{ $user->id }}">Email</label>
                    <input type="text" id="inputEmail{{ $user->id }}" name="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

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

                <div class="col-md-6">
                    <label class="form-label" for="inputPasswordConfirmation">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control">
                        <span class="input-group-text toggle-password1" style="cursor: pointer">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="rolesInput{{ $user->id }}" class="form-label">Roles</label>
                    <select class="form-control" name="roles" id="rolesInput{{ $user->id }}">
                        @foreach ($roles as $role)
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

                <div class="col-md-6">
                    <label class="form-label" for="statusInput{{ $user->id }}">Status</label>
                    <select class="form-control" name="status" id="statusInput{{ $user->id }}">
                        <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$user->status ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
window.addEventListener('load', function() {
    // Roles tagify initialization if needed (optional)

    // Initialize Dropzone for this user form
    dropZoneInitFunctions.push(function() {
        const previewTemplate = `
            <div class="dz-preview dz-file-preview w-100">
                <div class="dz-details">
                    <div class="dz-thumbnail" style="width: 150px; height: 150px;">
                        <img data-dz-thumbnail />
                        <span class="dz-nopreview">No preview</span>
                        <div class="dz-success-mark"></div>
                        <div class="dz-error-mark"></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    </div>
                    <div class="dz-filename" data-dz-name></div>
                    <div class="dz-size" data-dz-size></div>
                </div>
            </div>`;

        const dropzoneMulti = new Dropzone('#dropzone-img{{ $user->id }}', {
            url: '{{ route('file.upload') }}',
            previewTemplate: previewTemplate,
            parallelUploads: 1,
            maxFilesize: 100,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            sending: function(file, xhr, formData) {
                formData.append('folder', 'music');
            },
            success: function(file, response) {
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-success");
                }
                file.previewElement.dataset.path = response.path;

                const hiddenInputsContainer = file.previewElement.closest('form').querySelector('.hidden-inputs');

                // Remove old inputs before adding new to avoid duplicates
                hiddenInputsContainer.querySelectorAll('input[name="image"]').forEach(input => input.remove());

                hiddenInputsContainer.innerHTML +=
                    `<input type="hidden" name="image" value="${response.path}" data-path="${response.path}">`;
            },
            removedfile: function(file) {
                const hiddenInputsContainer = file.previewElement.closest('form').querySelector('.hidden-inputs');
                const inputToRemove = hiddenInputsContainer.querySelector(`input[data-path="${file.previewElement.dataset.path}"]`);
                if (inputToRemove) inputToRemove.remove();

                if (file.previewElement && file.previewElement.parentNode) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                $.ajax({
                    url: '{{ route('settings.user.delete-img', $user->id) }}',
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

        @if ($user->image)
        // Load existing image preview on page load
        $(document).ready(() => {
            var path = "{{ asset('storage/' . $user->image) }}";
            var rpath = "{{ $user->image }}";
            const parts = rpath.split("___");

            imageUrlToFile(path, parts).then((file) => {
                file.status = "success";
                file.accepted = true;
                file.dataURL = path;
                file.addPathToDataset = true;

                dropzoneMulti.on('addedfile', function(file) {
                    if (file.addPathToDataset)
                        file.previewElement.dataset.path = rpath;
                });

                dropzoneMulti.emit("addedfile", file, path);
                dropzoneMulti.emit("thumbnail", file, path);
            });
        });
        @endif
    });
});

async function imageUrlToFile(imageUrl, fileNameParts) {
    const response = await fetch(imageUrl);
    const blob = await response.blob();

    // Use second part from split as file name fallback
    const file = new File([blob], fileNameParts[1] || "image.png", { type: blob.type });

    return file;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-password1').forEach(function(element) {
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
