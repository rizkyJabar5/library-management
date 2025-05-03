<div {{ $attributes->merge(['class' => 'w-full overflow-x-auto rounded-xl shadow']) }}>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
        {{ $head }}
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        {{ $slot }}
        </tbody>
    </table>
</div>
