<div>

    <!-- Edit -->
    <button type="button" class="btn btn-sm btn-icon btn-edit-city" data-bs-toggle="tooltip" data-id="{{ $city->id }}"
        data-region_id="{{ $city->region_id }}" data-country_id="{{ $city->country_id }}"
        data-name="{{ $city->name }}" data-zipcode="{{ $city->zipcode }}"
        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true">
        <i class="bx bx-edit"></i>
    </button>

    <!-- Delete -->
    <form action="{{ route('settings.cities.destroy', $city->id) }}"
        onsubmit="confirmAction(event, () => event.target.submit())" method="post" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-offset="0,4"
            data-bs-placement="top" data-bs-html="true" data-bs-original-title="Remove"><i
                class="bx bx-trash me-1"></i></button>
    </form>

</div>


{{-- <x-modal id="editModal{{ $city->id }}" title="Edit City" saveBtnText="Update" saveBtnType="submit"
    saveBtnForm="editForm{{ $city->id }}" size="sm" :show="old('showEditFormModal' . $city->id) ? true : false">
    @include('content.settings.cities.includes.edit_form')
</x-modal> --}}
