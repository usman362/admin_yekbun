<form id="editForm{{ $bank->id }}" method="POST" action="{{ route('settings.paypal.update',$bank->id) }}" enctype="multipart/form-data">
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
                    <label class="form-label" for="inputTitle">Paypal Client Id</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Paypal Client Id" name="paypal_cleint_id" value="{{ $bank->paypal_cleint_id ?? '' }}">
                    @error('paypal_cleint_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Paypal Client Secret</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Paypal Client Secret" name="paypal_cleint_secret" value="{{ $bank->paypal_cleint_secret ?? '' }}">
                    @error('paypal_cleint_secret')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
        </div>
    </div>
</form>

