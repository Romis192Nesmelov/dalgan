<div id="slider" class="rounded-block owl-carousel">
    @foreach ($slider as $slide)
        <div class="slide" style="background: url({{ asset($slide->image) }})">
            <h1 class="w-100 text-center">{{ $slide->head }}</h1>
            <p class="w-100 text-center">{{ $slide->text }}</p>
            @include('blocks.button_block',[
                'primary' => true,
                'icon' => 'icon-envelop4',
                'buttonText' => trans('content.write_to_us'),
                'dataTarget' => 'feedback-modal'
            ])
        </div>
    @endforeach
</div>
