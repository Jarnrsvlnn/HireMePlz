<dialog {{ $attributes->merge(['class' => 'p-0 rounded-lg w-full max-w-lg backdrop:bg-black/50" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);']) }}>
    {{ $slot }}
</dialog>