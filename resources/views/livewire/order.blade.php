<div class="flex items-center justify-center w-screen h-screen mt-10">
    <div class="w-full max-w-xl p-6 space-y-8 bg-white border rounded-lg shadow border-zinc-300">
        <div>
            <span
                class="text-2xl mt-10 sm:text-3xl font-semibold from-[#f8cc6b] via-red-400 to-[#a16be3] text-transparent bg-clip-text bg-gradient-to-r inline-block">Hello,
                Elementor Designer 👋</span>
            <p class="mt-2 text-sm text-zinc-400">Masukan data diri dan pilih pesanan anda</p>
        </div>
        <form wire:submit.prevent="create">
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                {{ $this->form }}
            </div>
            <div class="flex items-center justify-between mt-4">
                <span>Harga Total : </span>
                <span class="text-2xl tracking-tight text-zinc-800">{{ $this->formattedPrice }}</span>
            </div>

        </form>


    </div>
</div>
