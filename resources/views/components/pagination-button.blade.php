@props(['jobs'])

<footer class="flex">
    <div class="flex flex-1 justify-between flex-col bg-yellow-300 -skew-x-10 border-7 border-black text-black">
        {{ $jobs->links() }}
    </div>
</footer>