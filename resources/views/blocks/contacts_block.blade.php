@foreach ($contacts as $contact)
    @if ($contact->type == 1) <i class="icon-location4"></i>{{ $contact->contact }}
    @elseif ($contact->type == 2) <i class="icon-iphone"></i>@include('blocks.phone_block',['phone' => $contact->contact])
    @elseif ($contact->type == 3) <i class="icon-envelop5"></i>@include('blocks.email_block',['email' => $contact->contact])
    @endif
@endforeach
