
<form id="createForm" method="POST" action="{{ route('settings.googlepay.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 mx-auto">
            
            <div class="row g-3">
                 <div class="col-md-12">
                    <label class="form-label" for="inputTitle">Add Title</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Add Title" name="add_title">
                    @error('add_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">GooglePay Client Id</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="googlepay Client Id" name="googlepay_cleint_id">
                    @error('googlepay_cleint_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="inputTitle">GooglePay Client Secret</label>
                    <input type="text" id="inputTitle" class="form-control" placeholder="Googlepay Client Secret" name="googlepay_cleint_secret">
                    @error('googlepay_cleint_secret')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                
            </div>
        </div>
    </div>
</form>

