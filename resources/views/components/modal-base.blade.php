<dialog {{ $attributes->merge(['class' => 'm-auto p-0 rounded-lg w-full max-w-lg backdrop:bg-black/50']) }}>
    {{ $slot }}
</dialog>