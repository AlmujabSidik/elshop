<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        Silahkan lakukan pembayaran ke nomor rekening dibawah ini : setelah itu silahkan klik submit untuk verifikasi
        manual.

        <div class="mt-4 p-4 bg-red-100 rounded-md">
            <h3 class="font-semibold text-lg">Informasi Pembayaran</h3>
            <p>Bank : BNI</p>
            <p>Nomor Rekening: 1284240532 </p>
            <p>Pemilik Rekening: ALMUJAB ANRAHMATHUL SIDIK</p>
            <p>Jumlah Pembayaran: {{ $this->formattedPrice }}</p>
        </div>
    </div>
</x-dynamic-component>
