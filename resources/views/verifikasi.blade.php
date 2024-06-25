@extends('layouts.app')
@section('title', 'Verifikasi Pembayaran ')
@section('content')
    <div class="flex items-center justify-center w-screen h-screen px-4 bg-zinc-900">
        <div class="w-full max-w-2xl p-8 bg-white border rounded-md shadow border-zinc-500">
            <div>
                <span
                    class="text-3xl font-semibold from-[#f8cc6b] via-red-400 to-[#a16be3] text-transparent bg-clip-text bg-gradient-to-r inline-block text-center ">Thank
                    You!</span>
                <p class="text-zinc-800 tracking-tight text-base leading-[1.5em] mt-2">Halo <span
                        class="font-bold">{{ $name }}</span> 👋,
                    <br />
                    Terima kasih banyak atas pesanan Anda!
                    <br />
                    Agar saya dapat memverifikasi pesanan Anda dengan cepat dan menghindari kesalahan, mohon hubungi admin
                    dengan menekan live chat di pojok kanan bawah .
                    <br />
                    <br /><br />
                    Salam hangat, <span class="text-lg font-bold text-slate-950">Almujab Sidik</span>
                </p>
            </div>


        </div>
    </div>
@endsection
