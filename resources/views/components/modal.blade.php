@php
    $uid = uniqid();
@endphp

<div class="modal fade modal-{{ $uid }}" {{ $attributes }} aria-modal="true" role="dialog">
    <div class="modal-dialog {{ $centered ? 'modal-dialog-centered' : '' }} modal-{{ $size }}" role="document">
        <div class="modal-content">

            @if ($title == 'detail-artist')
                <div class="modal-header">
                    <div class="d-flex w-100">
                        <div>
                            <img src="" id="artistImage" alt="" style="width: 50px;height: 50px;border-radius: 49px;margin: 0 10px;">
                        </div>
                        <div>
                            <h4 class="m-0"><span id="artistName"></span></h4>
                            <p class="m-0"><i><span id="artistGender"></span> - <span id="artistProvince"></span></i></p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @else
                <div class="modal-header">
                    @if ($title)
                        <div class="{{ $titleCentered ? 'text-center' : '' }} w-100">
                            {{-- <{{ $titleTag }} class="modal-title" id="modalCenterTitle">{{ $title }}</{{ $titleTag }}> --}}
                            <h4>
                                @if ($title)
                                    {{ $title }}
                                @else
                                    Title Name
                                @endif
                            </h4>
                        </div>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif
            <div class="modal-body" style="overflow-y: scroll;">
                {{ $slot }}
            </div>
            @if ($showFooter)
                <div class="modal-footer">
                    @if (isset($footer))
                        {{ $footer }}
                    @else
                        <button type="button" class="btn btn-label-secondary"
                            data-bs-dismiss="modal">{{ $closeBtnText ?? 'Close' }}</button>
                        @if ($showSaveBtn)
                            <button type="{{ $saveBtnType ?? 'button' }}" form="{{ $saveBtnForm }}"
                                class="{{ $saveBtnClass ? $saveBtnClass : 'btn btn-primary' }}"
                                onclick="{{ $onSaveBtnClick }}">{{ $saveBtnText ?? 'Save changes' }}</button>
                        @endif
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@if ($show)
    <script>
        window.addEventListener('load', () => {
            $('.modal-{{ $uid }}').modal('show');
        });
    </script>
@endif
