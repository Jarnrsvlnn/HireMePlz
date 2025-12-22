<x-mail::message>
    <h2>
        {{ $job_title }}
    </h2>

    Congratulations! You have obtained a Godlike tier Job!

    <x-mail::button :url="url('/jobs', $job_id)">
        View Job
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
