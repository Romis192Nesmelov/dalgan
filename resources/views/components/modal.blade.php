@props([
    'id' => '',
    'head' => false,
    'footer' => false,
    'yes_button' => false,
    'yes_button_class' => 'delete-yes',
    'yes_button_text' => trans('content.yes')
])

<div id="{{ $id }}" {{ $attributes->class('modal fade') }} tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if ($head)
                    <h5 class="modal-title fs-5 text-center w-100">{{ $head }}</h5>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="{{ trans('content.close') }}"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if ($footer)
                <div class="modal-footer d-flex justify-content-center">
                    @if ($yes_button)
                        @include('blocks.button_block',[
                            'buttonType' => 'button',
                            'primary' => true,
                            'addClass' => 'w-25 mt-3 '.$yes_button_class,
                            'buttonText' => $yes_button_text
                        ])
                        @include('blocks.button_block',[
                            'id' => null,
                            'primary' => true,
                            'dataDismiss' => true,
                            'addClass' => 'w-25 mt-3',
                            'buttonText' => trans('content.no')
                        ])
                    @else
                        @include('blocks.button_block',[
                            'id' => null,
                            'primary' => true,
                            'dataDismiss' => true,
                            'addClass' => 'w-50 m-auto mt-3',
                            'buttonText' => trans('content.close')
                        ])
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

