@props(['jobs'])

<footer class="flex">
    <div class="flex flex-1 justify-between flex-col">
        {{ $jobs->links() }}
    </div>
</footer>