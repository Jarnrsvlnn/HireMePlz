<a {{ $attributes->merge(['class' => 'relative bg-[rgb(50,50,50)] bg-cover bg-center bg-no-repeat min-w-0 text-center flex justify-center items-center flex-1 rounded-2xl cursor-pointer']) }}>
    <div class="absolute inset-0 bg-linear-to-t from-black/60 rounded-2xl via-transparent to-black/60">
    </div>
    <h1 class="text-white text-[clamp(1.3rem,2vw,2.5rem)] font-bold capitalize">{{ $slot }}</h1>
</a>    