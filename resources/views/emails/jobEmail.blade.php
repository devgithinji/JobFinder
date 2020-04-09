@component('mail::message')

Hi, {{$data['friend_name']}}, {{$data['your_name']}} ({{$data['your_email']}})
has referred you this job.

@component('mail::button', ['url' => $data['job_link']])
View Job
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
