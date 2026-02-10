@extends('layouts/layoutMaster')

@section('title', 'Zercash Products')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
@endsection

@section('content')

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-8 overflow-auto">

        <!-- Section 1: Upgrade Music Playlist -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Upgrade Music Playlist</h2>
                <button
                    class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add new Pack
                </button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <!-- Bronze Playlist -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/bronze-playlist.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Bronze Playlist</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-slate-500">Playlist Songs</p>
                                <p class="font-bold text-green-600">50 Songs</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-500">Price</p>
                                <div class="flex items-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                    <span class="font-bold">1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Silver Playlist -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/silver-playlist.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Silver Playlist</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-slate-500">Playlist Songs</p>
                                <p class="font-bold text-green-600">75 Songs</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-500">Price</p>
                                <div class="flex items-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                    <span class="font-bold">1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gold Playlist -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/gold-playlist.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Gold Playlist</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-slate-500">Playlist Songs</p>
                                <p class="font-bold text-green-600">100 Songs</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-500">Price</p>
                                <div class="flex items-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                    <span class="font-bold">1000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Choose Your Plan -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Choose Your Plan</h2>
                    <p class="text-sm text-slate-500">Select monthly or Yearly Plan</p>
                </div>
                <button
                    class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add Package
                </button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <!-- Cultivated -->
                <div class="bg-white rounded-xl p-5 relative shadow-sm">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 flex-shrink-0">
                            <img src="{{asset('images/Cultivated_service.svg')}}" alt="Cultivated"
                                class="w-full h-full object-contain" />
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-red-500">Cultivated</h3>
                            <span class="text-xs text-amber-500">Current access</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-3">
                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                        <span class="text-3xl font-bold">0.00</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">For individual use with 30 summaries a month, no
                        ads, and basic support.</p>
                    <div class="mb-4">
                        <img src="{{asset('images/cultivated-label.svg')}}" alt="Cultivated features" class="h-8" />
                    </div>
                    <ul class="text-xs text-slate-500 space-y-1.5 mb-4">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-green-500"></i>
                            Follow Users</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-green-500"></i>
                            Enjoy Music</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-green-500"></i>
                            Enjoy Videos</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Standard Wallet</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Get cashback</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> and more</li>
                    </ul>
                    <div class="pt-3">
                        <span class="text-sm text-green-500 font-medium flex items-center gap-1">Currently Activated <i
                                data-lucide="check" class="w-4 h-4"></i></span>
                    </div>
                </div>

                <!-- Educated -->
                <div class="bg-white rounded-xl p-5 relative shadow-sm border-2 border-green-400">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 flex-shrink-0">
                            <img src="{{asset('images/Educated_Service.svg')}}" alt="Educated" class="w-full h-full object-contain" />
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-amber-500">Educated</h3>
                            <span class="text-xs text-slate-500">Manage access</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-3">
                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                        <span class="text-3xl font-bold">0.00</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">Unlimited summaries, customization, quick
                        support, & app integrations for professionals.</p>
                    <div class="mb-4">
                        <img src="{{asset('images/educated-label.svg')}}" alt="Educated features" class="h-8" />
                    </div>
                    <ul class="text-xs text-slate-500 space-y-1.5 mb-4">
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Follow Users</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Enjoy Music</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Enjoy Videos</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Create Channel</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Text Comments</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Voice Comment</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Business Wallet</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Get cashback</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> and more</li>
                    </ul>
                    <div class="flex items-center justify-between pt-3">
                        <span class="text-xs font-bold bg-amber-100 text-amber-700 px-3 py-1.5 rounded">EDUCATED</span>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                            <span class="font-bold text-lg">25.00</span>
                        </div>
                    </div>
                </div>

                <!-- Academic -->
                <div class="bg-white rounded-xl p-5 relative shadow-sm border-2 border-green-400">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 flex-shrink-0">
                            <img src="{{asset('images/Acadmic_Service.svg')}}" alt="Academic" class="w-full h-full object-contain" />
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-green-500">Academic</h3>
                            <span class="text-xs text-slate-500">Manage access</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 mb-3">
                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                        <span class="text-3xl font-bold">0.00</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">Team-focused with priority support, API access,
                        and advanced security options.</p>
                    <div class="mb-4">
                        <img src="{{asset('images/educated-label.svg')}}" alt="Academic features" class="h-8" />
                    </div>
                    <ul class="text-xs text-slate-500 space-y-1.5 mb-4">
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Follow Users</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Enjoy Music</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Enjoy Videos</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Create Channel</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Text Comments</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Voice Comment</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Business Wallet</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> Get cashback</li>
                        <li class="flex items-center gap-2"><i data-lucide="check"
                                class="w-3.5 h-3.5 text-green-500"></i> and more...</li>
                    </ul>
                    <div class="flex items-center justify-between pt-3">
                        <span class="text-xs font-bold bg-green-100 text-green-700 px-3 py-1.5 rounded">Academic</span>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                            <span class="font-bold text-lg">25.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Streaming Minutes -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Streaming Minutes</h2>
                <button
                    class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add Package
                </button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <!-- Bronze Stream -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/bronze-stream.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Bronze Stream</h3>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs text-slate-500">Minute</span>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-green-600">60 Min</span>
                            <div class="flex items-center gap-1">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">500</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Silver Stream -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/silver-stream.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Silver Stream</h3>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs text-slate-500">Minute</span>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-green-600">120 Min</span>
                            <div class="flex items-center gap-1">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">1000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gold Stream -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="absolute top-2 right-2 z-10">
                        <span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">5%
                            CASHBACK</span>
                    </div>
                    <div class="h-44 w-full"
                        style="background-image: url('images/gold-stream.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <h3 class="font-bold text-lg text-slate-900 mb-3">Gold Stream</h3>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs text-slate-500">Minute</span>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-green-600">240 Min</span>
                            <div class="flex items-center gap-1">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">1500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4a: Standard Zer Package -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Standard Z&#234;r Package</h2>
                <button
                    class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add new Pack
                </button>
            </div>
            <div class="grid grid-cols-6 gap-3">
                <!-- Bronze Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/bronze-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Bronze</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">1000</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;9,99</p>
                    </div>
                </div>
                <!-- Silver Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/silver-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Silver</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">2500</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;24,99</p>
                    </div>
                </div>
                <!-- Gold Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/gold-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Gold</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">5000</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;49,99</p>
                    </div>
                </div>
                <!-- Titanium Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/titanium-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Titanium</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">10000</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;99,99</p>
                    </div>
                </div>
                <!-- Platinum Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/platinum-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Platinum</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">25000</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;249,99</p>
                    </div>
                </div>
                <!-- Diamond Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-6 h-6 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i>
                    </button>
                    <div class="h-28 w-full"
                        style="background-image: url('images/diamond-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold text-sm text-slate-900 mb-1">Diamond</h3>
                        <div class="flex items-center gap-1 mb-1">
                            <img src="{{asset('images/currency-icon.svg')}}" class="w-3.5 h-3.5" />
                            <span class="font-bold text-sm">50000</span>
                        </div>
                        <p class="text-xs text-slate-500">&#8364;499,99</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4b: Business Zer Package -->
        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Business Z&#234;r Package</h2>
                <button
                    class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add new Pack
                </button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <!-- Titanium Business Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="h-44 w-full"
                        style="background-image: url('images/titanium-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <div class="flex items-center justify-between mb-1">
                            <h3 class="font-bold text-slate-900">Titanium Pack</h3>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-1 text-cyan-500">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">10000</span>
                            </div>
                            <span class="font-bold">&#8364; 99,99</span>
                        </div>
                        <p class="text-[10px] text-slate-500">Use your Balance on YekB&#251;n</p>
                    </div>
                </div>
                <!-- Platinum Business Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="h-44 w-full"
                        style="background-image: url('images/platinum-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <div class="flex items-center justify-between mb-1">
                            <h3 class="font-bold text-slate-900">Platinum Pack</h3>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-1 text-cyan-500">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">25000</span>
                            </div>
                            <span class="font-bold">&#8364; 249,99</span>
                        </div>
                        <p class="text-[10px] text-slate-500">Use your Balance on YekB&#251;n</p>
                    </div>
                </div>
                <!-- Diamond Business Pack -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                    <button
                        class="absolute top-2 left-2 z-10 w-7 h-7 bg-white/80 rounded-md flex items-center justify-center hover:bg-white">
                        <i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i>
                    </button>
                    <div class="h-44 w-full"
                        style="background-image: url('images/diamond-pack.svg'); background-size: 100% 100%; background-position: center;">
                    </div>
                    <div class="pt-4 pb-4 px-4">
                        <div class="flex items-center justify-between mb-1">
                            <h3 class="font-bold text-slate-900">Diamond Pack</h3>
                            <span class="text-xs text-slate-500">Price</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-1 text-cyan-500">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-4 h-4" />
                                <span class="font-bold">50000</span>
                            </div>
                            <span class="font-bold">&#8364; 499,99</span>
                        </div>
                        <p class="text-[10px] text-slate-500">Use your Balance on YekB&#251;n</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 5: Sale Manager -->
        <section>
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold">Sale Manager</h2>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium bg-amber-500 text-white rounded-lg hover:bg-amber-600">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            Add Salemanager
                        </button>
                        <a href="#" class="text-sm text-slate-300 hover:text-white">Show all</a>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <!-- Manager 1 -->
                    <div class="bg-slate-700/50 rounded-xl p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-full bg-slate-500 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-sm">Salemanager Name</span>
                                    <button class="hover:text-amber-400">
                                        <i data-lucide="pencil" class="w-3 h-3"></i>
                                    </button>
                                </div>
                                <div class="flex items-center gap-1 text-xs text-slate-300 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span>
                                    <span>Rojava &#183; 11052 &#183; Qamishlo</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Zer in Treasur</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Shops</p>
                                <p class="font-semibold mt-0.5">20 Shops</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Join Date</p>
                                <p class="font-semibold mt-0.5">01/01/2025</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Win</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Manager 2 -->
                    <div class="bg-slate-700/50 rounded-xl p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-full bg-slate-500 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-sm">Salemanager Name</span>
                                    <button class="hover:text-amber-400">
                                        <i data-lucide="pencil" class="w-3 h-3"></i>
                                    </button>
                                </div>
                                <div class="flex items-center gap-1 text-xs text-slate-300 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span>
                                    <span>Rojava &#183; 11052 &#183; Qamishlo</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Zer in Treasur</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Shops</p>
                                <p class="font-semibold mt-0.5">20 Shops</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Join Date</p>
                                <p class="font-semibold mt-0.5">01/01/2025</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Win</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Manager 3 -->
                    <div class="bg-slate-700/50 rounded-xl p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 rounded-full bg-slate-500 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-sm">Salemanager Name</span>
                                    <button class="hover:text-amber-400">
                                        <i data-lucide="pencil" class="w-3 h-3"></i>
                                    </button>
                                </div>
                                <div class="flex items-center gap-1 text-xs text-slate-300 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span>
                                    <span>Rojava &#183; 11052 &#183; Qamishlo</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Zer in Treasur</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Shops</p>
                                <p class="font-semibold mt-0.5">20 Shops</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Join Date</p>
                                <p class="font-semibold mt-0.5">01/01/2025</p>
                            </div>
                            <div class="bg-slate-600/50 rounded-lg p-2">
                                <p class="text-slate-400">Total Win</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                    <span class="font-semibold">5000.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        lucide.createIcons();
    </script>

@endsection
