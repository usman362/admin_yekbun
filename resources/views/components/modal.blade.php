@php
    $uid = uniqid();
@endphp


@props([
    'title' => null,
    'subtitle' => null,
    'size' => 'md',
    'centered' => false,
    'titleCentered' => false,
    'showFooter' => true,
    'showSaveBtn' => true,
    'saveBtnText' => 'Save',
    'saveBtnType' => 'button',
    'saveBtnForm' => null,
    'saveBtnClass' => null,
    'closeBtnText' => 'Close',
    'btnimg'       =>  '',
    'onSaveBtnClick' => '',
    'headerClass' => '',
    'contentClass' => '',
    'hideClose' => false
])


<div class="modal fade modal-{{ $uid }}" {{ $attributes }} aria-modal="true" role="dialog">
    <div class="modal-dialog {{ $centered ? 'modal-dialog-centered' : '' }} modal-{{ $size }}" role="document">
        <div class="modal-content {{ $contentClass }}">

            @if ($title == 'detail-artist')
                <div class="modal-header {{ $headerClass }}">
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
                <div class="modal-header {{ $headerClass }}">
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
                            @if (!empty($subtitle))
                                <small class="text-muted">{{ $subtitle }}</small>
                            @endif
                        </div>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif
            {{-- <div class="modal-body" style="overflow-y: scroll;"> --}}
            <div class="modal-body" >
                {{ $slot }}
            </div>
            @if ($showFooter)
                <div class="modal-footer footer-custom">
                    @if (isset($footer))
                        {{ $footer }}
                    @else
                        <button type="button" class="btn btn-label-secondary close-custom"
                            data-bs-dismiss="modal">{{ $closeBtnText ?? 'Close' }}</button>
                        @if ($showSaveBtn)
                            <button type="{{ $saveBtnType ?? 'button' }}" form="{{ $saveBtnForm }}"
                                class="{{ $saveBtnClass ? $saveBtnClass : 'btn btn-primary' }}"
                                onclick="{{ $onSaveBtnClick }}">
                                @if($btnimg)
                                    <img src="{{$btnimg}}" class="uplobtn"/>
                                @endif

                                {{ $saveBtnText ?? 'Save changes' }}</button>
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
