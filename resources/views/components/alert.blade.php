@props(['status' => 'primary', 'message'])

@php
    $level = match($status) {
        'primary'       => 'mb-4 bg-primary-100 py-5 px-6 text-base text-primary-600 text-center',
        'secondary'     => 'mb-4 bg-secondary-100 py-5 px-6 text-base text-secondary-800 text-center',
        'success'       => 'mb-4 bg-success-100 py-5 px-6 text-base text-success-700 text-center',
        'danger'        => 'mb-4 bg-danger-100 py-5 px-6 text-base text-danger-700 text-center',
        'warning'       => 'mb-4 bg-warning-100 py-5 px-6 text-base text-warning-800 text-center',
        'info'          => 'mb-4 bg-info-100 py-5 px-6 text-base text-info-800 text-center',
    };
@endphp

<div {{ $attributes->merge(['class' => $level]) }}
    role="alert"
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
>
    {{ $message }}
</div>
