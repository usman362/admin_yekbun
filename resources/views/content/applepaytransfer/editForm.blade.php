<form id="editForm{{ $bank->id }}" method="POST" action="{{ route('settings.applepay.update',$bank->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                 <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Add Title</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Add Title" name="add_title" value="{{ $bank->add_title ?? '' }}">
                    @error('add_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">ApplePay Client Id</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Apple Client Id" name="applepay_cleint_id" value="{{ $bank->applepay_cleint_id ?? '' }}">
                    @error('applepay_cleint_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">ApplePay Client Secret</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Apple Client Secret" name="applepay_cleint_secret" value="{{ $bank->applepay_cleint_secret ?? '' }}">
                    @error('applepay_cleint_secret')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
        </div>
    </div>
</form>

