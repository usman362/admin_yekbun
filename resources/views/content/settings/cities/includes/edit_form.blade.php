<form id="editForm" action="{{ route('settings.cities.update',1) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="showEditFormModal" value="1">
    <input type="hidden" name="id" id="city_id">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label d-block" for="editCountryId"> Select Country</label>
                    <select id="editCountryId" name="country_id" class="form-control" onchange="loadRegions(event)">
                        <option value="">Choose</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label d-block" for="editRegionId">Select Province</label>
                    <select id="editRegionId" name="region_id" class="form-control">
                        <option value="">Choose</option>
                        @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                    @error('region_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="editZipcode">Zipcode</label>
                    <input type="text" id="editZipcode" name="zipcode" class="form-control" value="{{ old('zipcode') }}" placeholder="Zipcode">
                    @error('zipcode')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="editName">City Name</label>
                    <input type="text" id="editName" name="name" class="form-control" value="{{ old('name') }}" placeholder="City Name">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    window.addEventListener('load', function () {
        $("#editCountryId").select2();
        $("#editRegionId").select2();
    });
</script>
