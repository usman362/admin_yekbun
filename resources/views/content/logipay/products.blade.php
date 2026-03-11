@extends('layouts/layoutMaster')

@section('title', 'Zercash Products')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
@endsection

@section('content')
    @php
        $upgradePlaylists = $groupedProducts->get('upgrade_music_playlist', collect());
        $plans = $groupedProducts->get('choose_your_plan', collect());
        $streamingMinutes = $groupedProducts->get('streaming_minutes', collect());
        $standardPackages = $groupedProducts->get('standard_zer_package', collect());
        $businessPackages = $groupedProducts->get('business_zer_package', collect());

        $currencyIcon = asset('images/currency-icon.svg');
    @endphp

    <main class="flex-1 p-6 space-y-8 overflow-auto">
        @if (session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-700 px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-lg border border-rose-200 bg-rose-50 text-rose-700 px-4 py-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Upgrade Music Playlist</h2>
                <details>
                    <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">Add new Pack</summary>
                    <form method="POST" action="{{ route('zercash.products.store') }}" class="mt-3 bg-white p-3 border rounded-lg grid grid-cols-5 gap-2">
                        @csrf
                        <input type="hidden" name="category" value="upgrade_music_playlist">
                        <select name="setting_id" class="border rounded px-2 py-1 text-sm">@foreach($settings as $setting)<option value="{{ $setting->_id }}">{{ $setting->label }}</option>@endforeach</select>
                        <input name="name" required placeholder="Name" class="border rounded px-2 py-1 text-sm" />
                        <input name="songs_count" type="number" min="0" placeholder="Songs" class="border rounded px-2 py-1 text-sm" />
                        <input name="zer_amount" type="number" step="0.01" min="0" placeholder="Price" class="border rounded px-2 py-1 text-sm" />
                        <button class="bg-amber-500 text-white rounded px-3 py-1 text-sm">Save</button>
                    </form>
                </details>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($upgradePlaylists as $product)
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                        <details class="absolute top-2 left-2 z-20">
                            <summary class="list-none cursor-pointer w-7 h-7 bg-white/90 rounded-md flex items-center justify-center"><i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i></summary>
                            <div class="mt-2 w-80 bg-white border rounded-lg shadow p-2 space-y-2">
                                <form method="POST" action="{{ route('zercash.products.update',$product->_id) }}" class="grid grid-cols-2 gap-2">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="category" value="upgrade_music_playlist">
                                    <select name="setting_id" class="col-span-2 border rounded px-2 py-1 text-xs">@foreach($settings as $setting)<option value="{{ $setting->_id }}" @selected((string)$product->setting_id === (string)$setting->_id)>{{ $setting->label }}</option>@endforeach</select>
                                    <input name="name" value="{{ $product->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required>
                                    <input name="songs_count" value="{{ $product->songs_count }}" type="number" min="0" class="border rounded px-2 py-1 text-xs">
                                    <input name="zer_amount" value="{{ $product->zer_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <input name="cashback_percent" value="{{ $product->cashback_percent }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs" placeholder="Cashback %">
                                    <input name="image" value="{{ $product->image }}" class="border rounded px-2 py-1 text-xs" placeholder="Image path">
                                    <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                                </form>
                                <form method="POST" action="{{ route('zercash.products.destroy',$product->_id) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')<button class="w-full bg-rose-600 text-white rounded px-2 py-1 text-xs">Delete</button></form>
                            </div>
                        </details>
                        @if($product->cashback_percent)
                            <div class="absolute top-2 right-2 z-10"><span class="bg-green-500 text-white text-[10px] font-semibold px-3 py-1 rounded-full">{{ rtrim(rtrim(number_format($product->cashback_percent,2,'.',''),'0'),'.') }}% CASHBACK</span></div>
                        @endif
                        <div class="h-44 w-full" style="background-image: url('{{ $product->image ? asset($product->image) : asset('images/bronze-playlist.svg') }}'); background-size: 100% 100%; background-position: center;"></div>
                        <div class="pt-4 pb-4 px-4">
                            <h3 class="font-bold text-lg text-slate-900 mb-3">{{ $product->name }}</h3>
                            <div class="flex items-center justify-between">
                                <div><p class="text-xs text-slate-500">Playlist Songs</p><p class="font-bold text-green-600">{{ (int)($product->songs_count ?? 0) }} Songs</p></div>
                                <div class="text-right"><p class="text-xs text-slate-500">Price</p><div class="flex items-center gap-1"><img src="{{ $currencyIcon }}" class="w-4 h-4" /><span class="font-bold">{{ (int)($product->zer_amount ?? 0) }}</span></div></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-4">
                <div><h2 class="text-xl font-semibold text-slate-900">Choose Your Plan</h2><p class="text-sm text-slate-500">Select monthly or Yearly Plan</p></div>
                <details>
                    <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">Add Package</summary>
                    <form method="POST" action="{{ route('zercash.products.store') }}" class="mt-3 bg-white p-3 border rounded-lg grid grid-cols-4 gap-2">
                        @csrf
                        <input type="hidden" name="category" value="choose_your_plan">
                        <input name="name" required placeholder="Plan name" class="border rounded px-2 py-1 text-sm" />
                        <input name="fiat_amount" type="number" step="0.01" min="0" placeholder="Price" class="border rounded px-2 py-1 text-sm" />
                        <input name="badge" placeholder="Badge" class="border rounded px-2 py-1 text-sm" />
                        <button class="bg-amber-500 text-white rounded px-3 py-1 text-sm">Save</button>
                    </form>
                </details>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($plans as $product)
                    <div class="bg-white rounded-xl p-5 relative shadow-sm border-2 border-green-400">
                        <div class="absolute top-2 right-2 z-20">
                            <form method="POST" action="{{ route('zercash.products.destroy',$product->_id) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')<button class="w-6 h-6 rounded bg-rose-100 text-rose-700 text-xs">x</button></form>
                        </div>
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 flex-shrink-0"><img src="{{ $product->image ? asset($product->image) : asset('images/Cultivated_service.svg') }}" alt="{{ $product->name }}" class="w-full h-full object-contain" /></div>
                            <div><h3 class="font-bold text-lg text-amber-500">{{ $product->name }}</h3><span class="text-xs text-slate-500">{{ $product->badge ?: 'Manage access' }}</span></div>
                        </div>
                        <div class="flex items-center gap-1 mb-3"><img src="{{ $currencyIcon }}" class="w-5 h-5" /><span class="text-3xl font-bold">{{ number_format((float)($product->fiat_amount ?? 0),2) }}</span></div>
                        <p class="text-xs text-slate-500 mb-4 leading-relaxed">{{ $product->description }}</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 mb-4">
                            @foreach(($product->features ?? []) as $feature)
                                <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-green-500"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <details>
                            <summary class="cursor-pointer text-xs text-amber-600">Edit</summary>
                            <form method="POST" action="{{ route('zercash.products.update',$product->_id) }}" class="mt-2 grid grid-cols-2 gap-2">
                                @csrf @method('PUT')
                                <input type="hidden" name="category" value="choose_your_plan">
                                <input name="name" value="{{ $product->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required>
                                <input name="fiat_amount" value="{{ $product->fiat_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                <input name="badge" value="{{ $product->badge }}" class="border rounded px-2 py-1 text-xs">
                                <textarea name="description" class="col-span-2 border rounded px-2 py-1 text-xs">{{ $product->description }}</textarea>
                                <textarea name="features" class="col-span-2 border rounded px-2 py-1 text-xs">{{ implode(', ', $product->features ?? []) }}</textarea>
                                <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                            </form>
                        </details>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Streaming Minutes</h2>
                <details>
                    <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">Add Package</summary>
                    <form method="POST" action="{{ route('zercash.products.store') }}" class="mt-3 bg-white p-3 border rounded-lg grid grid-cols-4 gap-2">
                        @csrf
                        <input type="hidden" name="category" value="streaming_minutes">
                        <input name="name" required placeholder="Name" class="border rounded px-2 py-1 text-sm" />
                        <input name="songs_count" type="number" min="0" placeholder="Minutes" class="border rounded px-2 py-1 text-sm" />
                        <input name="zer_amount" type="number" step="0.01" min="0" placeholder="Price" class="border rounded px-2 py-1 text-sm" />
                        <button class="bg-amber-500 text-white rounded px-3 py-1 text-sm">Save</button>
                    </form>
                </details>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($streamingMinutes as $product)
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                        <details class="absolute top-2 left-2 z-20">
                            <summary class="list-none cursor-pointer w-7 h-7 bg-white/90 rounded-md flex items-center justify-center"><i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i></summary>
                            <div class="mt-2 w-72 bg-white border rounded-lg shadow p-2 space-y-2">
                                <form method="POST" action="{{ route('zercash.products.update',$product->_id) }}" class="grid grid-cols-2 gap-2">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="category" value="streaming_minutes">
                                    <input name="name" value="{{ $product->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required>
                                    <input name="songs_count" value="{{ $product->songs_count }}" type="number" min="0" class="border rounded px-2 py-1 text-xs">
                                    <input name="zer_amount" value="{{ $product->zer_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                                </form>
                                <form method="POST" action="{{ route('zercash.products.destroy',$product->_id) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')<button class="w-full bg-rose-600 text-white rounded px-2 py-1 text-xs">Delete</button></form>
                            </div>
                        </details>
                        <div class="h-44 w-full" style="background-image: url('{{ $product->image ? asset($product->image) : asset('images/bronze-stream.svg') }}'); background-size: 100% 100%; background-position: center;"></div>
                        <div class="pt-4 pb-4 px-4">
                            <h3 class="font-bold text-lg text-slate-900 mb-3">{{ $product->name }}</h3>
                            <div class="flex items-center justify-between mb-1"><span class="text-xs text-slate-500">Minute</span><span class="text-xs text-slate-500">Price</span></div>
                            <div class="flex items-center justify-between"><span class="text-sm font-bold text-green-600">{{ (int)($product->songs_count ?? 0) }} Min</span><div class="flex items-center gap-1"><img src="{{ $currencyIcon }}" class="w-4 h-4" /><span class="font-bold">{{ (int)($product->zer_amount ?? 0) }}</span></div></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Standard Z&#234;r Package</h2>
                <details>
                    <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">Add new Pack</summary>
                    <form method="POST" action="{{ route('zercash.products.store') }}" class="mt-3 bg-white p-3 border rounded-lg grid grid-cols-4 gap-2">
                        @csrf
                        <input type="hidden" name="category" value="standard_zer_package">
                        <input name="name" required placeholder="Name" class="border rounded px-2 py-1 text-sm" />
                        <input name="zer_amount" type="number" step="0.01" min="0" placeholder="Zer" class="border rounded px-2 py-1 text-sm" />
                        <input name="fiat_amount" type="number" step="0.01" min="0" placeholder="EUR" class="border rounded px-2 py-1 text-sm" />
                        <button class="bg-amber-500 text-white rounded px-3 py-1 text-sm">Save</button>
                    </form>
                </details>
            </div>
            <div class="grid grid-cols-6 gap-3">
                @foreach($standardPackages as $product)
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                        <details class="absolute top-2 left-2 z-20">
                            <summary class="list-none cursor-pointer w-6 h-6 bg-white/90 rounded-md flex items-center justify-center"><i data-lucide="pencil" class="w-3 h-3 text-slate-500"></i></summary>
                            <div class="mt-2 w-64 bg-white border rounded-lg shadow p-2 space-y-2">
                                <form method="POST" action="{{ route('zercash.products.update',$product->_id) }}" class="grid grid-cols-2 gap-2">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="category" value="standard_zer_package">
                                    <input name="name" value="{{ $product->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required>
                                    <input name="zer_amount" value="{{ $product->zer_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <input name="fiat_amount" value="{{ $product->fiat_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                                </form>
                                <form method="POST" action="{{ route('zercash.products.destroy',$product->_id) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')<button class="w-full bg-rose-600 text-white rounded px-2 py-1 text-xs">Delete</button></form>
                            </div>
                        </details>
                        <div class="h-28 w-full" style="background-image: url('{{ $product->image ? asset($product->image) : asset('images/bronze-pack.svg') }}'); background-size: 100% 100%; background-position: center;"></div>
                        <div class="p-3">
                            <h3 class="font-bold text-sm text-slate-900 mb-1">{{ $product->name }}</h3>
                            <div class="flex items-center gap-1 mb-1"><img src="{{ $currencyIcon }}" class="w-3.5 h-3.5" /><span class="font-bold text-sm">{{ (int)($product->zer_amount ?? 0) }}</span></div>
                            <p class="text-xs text-slate-500">&#8364;{{ number_format((float)($product->fiat_amount ?? 0),2,',','') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-slate-900">Business Z&#234;r Package</h2>
                <details>
                    <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-amber-600 border border-amber-300 rounded-lg hover:bg-amber-50">Add new Pack</summary>
                    <form method="POST" action="{{ route('zercash.products.store') }}" class="mt-3 bg-white p-3 border rounded-lg grid grid-cols-4 gap-2">
                        @csrf
                        <input type="hidden" name="category" value="business_zer_package">
                        <input name="name" required placeholder="Name" class="border rounded px-2 py-1 text-sm" />
                        <input name="zer_amount" type="number" step="0.01" min="0" placeholder="Zer" class="border rounded px-2 py-1 text-sm" />
                        <input name="fiat_amount" type="number" step="0.01" min="0" placeholder="EUR" class="border rounded px-2 py-1 text-sm" />
                        <button class="bg-amber-500 text-white rounded px-3 py-1 text-sm">Save</button>
                    </form>
                </details>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($businessPackages as $product)
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden relative">
                        <details class="absolute top-2 left-2 z-20">
                            <summary class="list-none cursor-pointer w-7 h-7 bg-white/90 rounded-md flex items-center justify-center"><i data-lucide="pencil" class="w-3.5 h-3.5 text-slate-500"></i></summary>
                            <div class="mt-2 w-72 bg-white border rounded-lg shadow p-2 space-y-2">
                                <form method="POST" action="{{ route('zercash.products.update',$product->_id) }}" class="grid grid-cols-2 gap-2">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="category" value="business_zer_package">
                                    <input name="name" value="{{ $product->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required>
                                    <input name="zer_amount" value="{{ $product->zer_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <input name="fiat_amount" value="{{ $product->fiat_amount }}" type="number" step="0.01" min="0" class="border rounded px-2 py-1 text-xs">
                                    <textarea name="description" class="col-span-2 border rounded px-2 py-1 text-xs">{{ $product->description }}</textarea>
                                    <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                                </form>
                                <form method="POST" action="{{ route('zercash.products.destroy',$product->_id) }}" onsubmit="return confirm('Delete this item?')">@csrf @method('DELETE')<button class="w-full bg-rose-600 text-white rounded px-2 py-1 text-xs">Delete</button></form>
                            </div>
                        </details>
                        <div class="h-44 w-full" style="background-image: url('{{ $product->image ? asset($product->image) : asset('images/titanium-pack.svg') }}'); background-size: 100% 100%; background-position: center;"></div>
                        <div class="pt-4 pb-4 px-4">
                            <div class="flex items-center justify-between mb-1"><h3 class="font-bold text-slate-900">{{ $product->name }}</h3><span class="text-xs text-slate-500">Price</span></div>
                            <div class="flex items-center justify-between mb-2"><div class="flex items-center gap-1 text-cyan-500"><img src="{{ $currencyIcon }}" class="w-4 h-4" /><span class="font-bold">{{ (int)($product->zer_amount ?? 0) }}</span></div><span class="font-bold">&#8364; {{ number_format((float)($product->fiat_amount ?? 0),2,',','') }}</span></div>
                            <p class="text-[10px] text-slate-500">{{ $product->description ?: 'Use your Balance on YekBun' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl p-6 text-white">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold">Sale Manager</h2>
                    <div class="flex items-center gap-3">
                        <details>
                            <summary class="cursor-pointer list-none flex items-center gap-1 px-3 py-1.5 text-sm font-medium bg-amber-500 text-white rounded-lg hover:bg-amber-600">Add Salemanager</summary>
                            <form method="POST" action="{{ route('zercash.sale_managers.store') }}" class="mt-3 bg-white text-slate-900 p-3 border rounded-lg grid grid-cols-3 gap-2 w-[760px] max-w-[90vw]">
                                @csrf
                                <input name="name" required placeholder="Name" class="border rounded px-2 py-1 text-xs" />
                                <input name="country" placeholder="Country" class="border rounded px-2 py-1 text-xs" />
                                <input name="city" placeholder="City" class="border rounded px-2 py-1 text-xs" />
                                <input name="code" placeholder="Code" class="border rounded px-2 py-1 text-xs" />
                                <input name="zer_in_treasur" type="number" step="0.01" min="0" placeholder="Zer in Treasur" class="border rounded px-2 py-1 text-xs" />
                                <input name="total_shops" type="number" min="0" placeholder="Total shops" class="border rounded px-2 py-1 text-xs" />
                                <input name="join_date" type="date" class="border rounded px-2 py-1 text-xs" />
                                <input name="total_win" type="number" step="0.01" min="0" placeholder="Total win" class="border rounded px-2 py-1 text-xs" />
                                <button class="bg-amber-500 text-white rounded px-3 py-1 text-xs">Save</button>
                            </form>
                        </details>
                        <a href="#" class="text-sm text-slate-300 hover:text-white">Show all</a>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($saleManagers as $manager)
                        <div class="bg-slate-700/50 rounded-xl p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-slate-500 flex-shrink-0 overflow-hidden">
                                    @if($manager->image)
                                        <img src="{{ asset($manager->image) }}" class="w-full h-full object-cover" />
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold text-sm">{{ $manager->name }}</span>
                                        <details>
                                            <summary class="list-none cursor-pointer hover:text-amber-400"><i data-lucide="pencil" class="w-3 h-3"></i></summary>
                                            <div class="mt-2 bg-white text-slate-900 border rounded-lg shadow p-2 w-80">
                                                <form method="POST" action="{{ route('zercash.sale_managers.update', $manager->_id) }}" class="grid grid-cols-2 gap-2">
                                                    @csrf @method('PUT')
                                                    <input name="name" value="{{ $manager->name }}" class="col-span-2 border rounded px-2 py-1 text-xs" required />
                                                    <input name="country" value="{{ $manager->country }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="city" value="{{ $manager->city }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="code" value="{{ $manager->code }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="join_date" type="date" value="{{ $manager->join_date }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="zer_in_treasur" type="number" step="0.01" min="0" value="{{ $manager->zer_in_treasur }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="total_shops" type="number" min="0" value="{{ $manager->total_shops }}" class="border rounded px-2 py-1 text-xs" />
                                                    <input name="total_win" type="number" step="0.01" min="0" value="{{ $manager->total_win }}" class="border rounded px-2 py-1 text-xs" />
                                                    <button class="col-span-2 bg-slate-900 text-white rounded px-2 py-1 text-xs">Update</button>
                                                </form>
                                                <form method="POST" action="{{ route('zercash.sale_managers.destroy', $manager->_id) }}" onsubmit="return confirm('Delete this salemanager?')" class="mt-2">@csrf @method('DELETE')<button class="w-full bg-rose-600 text-white rounded px-2 py-1 text-xs">Delete</button></form>
                                            </div>
                                        </details>
                                    </div>
                                    <div class="flex items-center gap-1 text-xs text-slate-300 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span>
                                        <span>{{ $manager->country }} &#183; {{ $manager->code }} &#183; {{ $manager->city }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <div class="bg-slate-600/50 rounded-lg p-2">
                                    <p class="text-slate-400">Zer in Treasur</p>
                                    <div class="flex items-center gap-1 mt-0.5">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                        <span class="font-semibold">{{ number_format((float)($manager->zer_in_treasur ?? 0),2,'.','') }}</span>
                                    </div>
                                </div>
                                <div class="bg-slate-600/50 rounded-lg p-2">
                                    <p class="text-slate-400">Total Shops</p>
                                    <p class="font-semibold mt-0.5">{{ (int)($manager->total_shops ?? 0) }} Shops</p>
                                </div>
                                <div class="bg-slate-600/50 rounded-lg p-2">
                                    <p class="text-slate-400">Join Date</p>
                                    <p class="font-semibold mt-0.5">{{ \Carbon\Carbon::parse($manager->join_date ?? now())->format('d/m/Y') }}</p>
                                </div>
                                <div class="bg-slate-600/50 rounded-lg p-2">
                                    <p class="text-slate-400">Total Win</p>
                                    <div class="flex items-center gap-1 mt-0.5">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                        <span class="font-semibold">{{ number_format((float)($manager->total_win ?? 0),2,'.','') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <script>lucide.createIcons();</script>
@endsection
