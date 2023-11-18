<form action="{{ route('send_request') }}">
    @csrf
    <div class="w-100 row">
        @include('blocks.input_block',[
            'addClass' => $rowMode ? 'col-lg-3 col-md-6 col-xs-12 mb-3 mb-lg-0' : 'w-100 mb-3',
            'name' => 'name',
            'required' => true,
            'placeholder' => trans('content.your_name'),
            'ajax' => true
        ])
        @include('blocks.input_block',[
            'addClass' => $rowMode ? 'col-lg-3 col-md-6 col-xs-12 mb-3 mb-lg-0' : 'w-100 mb-3',
            'name' => 'email',
            'required' => true,
            'placeholder' => trans('content.your_email'),
            'ajax' => true
        ])
        @include('blocks.input_block',[
            'addClass' => $rowMode ? 'col-lg-3 col-md-6 col-xs-12 mb-3 mb-lg-0' : 'w-100 mb-3',
            'name' => 'phone',
            'required' => true,
            'placeholder' => trans('content.your_phone'),
            'ajax' => true
        ])
        <div class="{{ $rowMode ? 'col-lg-3 col-md-6 col-xs-12 mb-3 mb-lg-0' : 'w-100 mb-3' }}">
            @include('blocks.button_block',[
                'primary' => true,
                'addClass' => 'w-100',
                'icon' => 'icon-move-up',
                'buttonType' => 'submit',
                'buttonText' => trans('content.send'),
                'disabled' => true
            ])
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center align-items-center">
        @include('blocks.checkbox_block',[
            'name' => 'i_agree',
            'label' => trans('content.i_agree'),
            'ajax' => true
        ])
    </div>
</form>
