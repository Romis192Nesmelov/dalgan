@foreach ($contacts as $contact)
    @if ($contact->type == 1) {!! $headMode ?  '<h3>'.$contact->contact.'</h3>' : '<span class="mb-1 me-2">'.$contact->contact.'</span>' !!}
    @elseif ($contact->type == 2) <span class="mb-1 me-2">@include('blocks.phone_block',['phone' => $contact->contact])</span>
    @elseif ($contact->type == 3) <span class="mb-1 me-2">@include('blocks.email_block',['email' => $contact->contact])</span>
    @endif
@endforeach
