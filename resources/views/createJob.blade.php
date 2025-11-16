<x-layout>
    <div class="w-xl">
        <h1 class="text-4xl font-medium">Create Job</h1>
        <form class="w-xl p-10 border border-red-900 rounded-xl flex flex-col items-center justify-center gap-2" method="POST" action="/jobs/create">
            @csrf
            <div class="w-xl flex flex-col">
                <input class="border rounded-xl border-red-900" name="job_title" type="text" placeholder="Enter job title" required/>
            </div>

            <div class="w-xl flex flex-col">
                <input class="border rounded-xl border-red-900" name="salary" type="text" placeholder="Enter salary" required/>
            </div>
    
            <div class="w-xl flex flex-col">>
                <label for="description">Description</label>
                <textarea class="border rounded-xl border-red-900" rows="3" name="description" placeholder="Write details..."></textarea>
            </div>
            <button class=" w-sm border rounded-xl border-blue-900 bg-blue-600 text-white font-light">Add Job</button>
        </form>    
    </div>
</x-layout>