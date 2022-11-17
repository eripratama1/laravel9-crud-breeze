@props(['status'])

@if ($status)
     <div {{ $attributes->merge(['class' => 'toast flex items-center p-4 bg-gray-800 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg divide-x divide-gray-200 shadow dark:text-white-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert']) }}>
        <div class="pl-4 text-sm font-normal">{{ $status }}</div>
    </div>
@endif
