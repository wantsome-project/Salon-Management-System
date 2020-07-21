@component('mail::message')

# Hello {{$appointment->customer->user->name}},
## You have an appointment {{$appointment->status}} on
- {{$appointment->appointment_date}} at {{$appointment->appointment_time}}.
### Please give us a call.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
