<div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
    <!-- modal trigger -->
    <!-- <div>
        <label for="tw-modal" class="cursor-pointer rounded bg-black px-8 py-4 text-white active:bg-slate-400">OPEN
            MODAL</label>
    </div> -->
    <!-- hidden toggle -->
    <input type="checkbox" id="tw-modal" class="peer fixed appearance-none opacity-0" checked />
    <!-- modal -->
    <label for="tw-modal"
        class="pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">
        <!-- modal box -->
        <label
            class="max-h-[calc(100vh - 2em)] w-[90%] md:w-[80%] lg:w-[70%] h-[80vh] scale-90 overflow-hidden rounded-md bg-white p-6 text-black shadow-2xl transition"
            for="">
            <!-- <h3 class="text-lg font-bold">Modal opened!</h3> -->
            <p class="py-4">
            <div class="w-full h-full">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/1IZzFHVGWKg"
                    title="Eduardo Pina plays Capricho Árabe" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            </p>
        </label>
    </label>
</div>