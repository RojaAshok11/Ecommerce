@component('mail::message')
# New User Details

The Products details of the new user:

- **Name:** {{ $user->name }}
- **Email:** {{ $user->email }}
- **Phone:** {{ $user->phone }}
- **Address:** {{ $user->address }}
- **Quantity:** {{ $user->quantity }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
