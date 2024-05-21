<form id="editForm{{ $server->id }}" action="{{ route('settings.servers.update', $server->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="showEditFormModal{{ $server->id }}" value="1">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="inputServerAddress">Server Address</label>
                    <input type="text" id="inputServerAddress" name="address" class="form-control" value="{{ $server->address }}" placeholder="Server Address">
                    @error('address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputPort">Port</label>
                    <input type="text" id="inputPort" name="port" class="form-control" value="{{ $server->port }}" placeholder="Port">
                    @error('port')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputUsername">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control" value="{{ $server->username }}" placeholder="Username">
                    @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="text" id="inputPassword" name="password" class="form-control" value="{{ $server->password }}" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputHTTPLink">HTTP Link</label>
                    <input type="text" id="inputHTTPLink" name="http_link" class="form-control" value="{{ $server->http_link }}" placeholder="HTTP Link">
                    @error('http_link')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputCountry">Country</label>
                    <input type="text" id="inputCountry" name="country" class="form-control" value="{{ $server->country }}" placeholder="Country">
                    @error('country')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputFileLimit">File Limit</label>
                    <input type="text" id="inputFileLimit" name="file_limit" class="form-control" value="{{ $server->file_limit }}" placeholder="File Limit">
                    @error('file_limit')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>