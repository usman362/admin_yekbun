@extends('layouts/layoutMaster')

@section('title', 'Zercash Settings')

@section('content')
    <main class="flex-1 p-6 space-y-6 overflow-auto">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-slate-900">Zercash Settings (Dynamic)</h2>
            <a href="{{ route('zercash.products') }}" class="text-sm text-amber-600 hover:text-amber-700">Manage Products</a>
        </div>

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

        <section class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
            <h3 class="text-base font-semibold text-slate-900 mb-1">Create Setting</h3>
            <p class="text-xs text-slate-500 mb-4">Each setting can own multiple products. This is the relation used by `/zercash-products`.</p>

            <form method="POST" action="{{ route('zercash.settings.store') }}" class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @csrf
                <input name="key" required placeholder="Unique key (example: general)"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="label" required placeholder="Label"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="default_currency" value="EUR" required placeholder="Default currency"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                <input name="allowed_currencies" placeholder="Allowed currencies (EUR,USD)"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="zer_to_euro" type="number" step="0.001" min="0" placeholder="Zer to Euro"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="zer_to_dollar" type="number" step="0.001" min="0" placeholder="Zer to Dollar"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                <input name="treasury_sell_euro" type="number" step="0.001" min="0" placeholder="Treasury Sell Euro"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="treasury_sell_dollar" type="number" step="0.001" min="0" placeholder="Treasury Sell Dollar"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="wallet_reserve" type="number" step="0.01" min="0" placeholder="Wallet reserve"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                <input name="transaction_fee_percent" type="number" step="0.01" min="0" placeholder="Transaction fee %"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <input name="sort_order" type="number" min="0" placeholder="Sort order"
                    class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                <select name="is_active" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                    <option value="1">active</option>
                    <option value="0">inactive</option>
                </select>

                <textarea name="description" rows="2" placeholder="Description"
                    class="md:col-span-3 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm"></textarea>

                <div class="md:col-span-3">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-amber-500 text-white text-sm hover:bg-amber-600">
                        Save Setting
                    </button>
                </div>
            </form>
        </section>

        <section class="space-y-3">
            <h3 class="text-base font-semibold text-slate-900">Existing Settings + Product Relations</h3>

            @foreach ($settings as $setting)
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h4 class="font-semibold text-slate-900">{{ $setting->label }} <span class="text-xs text-slate-500">({{ $setting->key }})</span></h4>
                            <p class="text-xs text-slate-500">
                                Related products: <span class="font-medium">{{ $setting->products_count ?? 0 }}</span>
                                @if ((string) $setting->_id === (string) $defaultSetting->_id)
                                    | Default setting
                                @endif
                            </p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded {{ $setting->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ $setting->is_active ? 'active' : 'inactive' }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('zercash.settings.update', $setting->_id) }}" class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        @csrf
                        @method('PUT')

                        <input name="label" value="{{ $setting->label }}" required
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="default_currency" value="{{ $setting->default_currency ?? 'EUR' }}" required
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="allowed_currencies" value="{{ implode(',', $setting->allowed_currencies ?? []) }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                        <input name="zer_to_euro" type="number" step="0.001" min="0" value="{{ $setting->zer_to_euro ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="zer_to_dollar" type="number" step="0.001" min="0" value="{{ $setting->zer_to_dollar ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="treasury_sell_euro" type="number" step="0.001" min="0" value="{{ $setting->treasury_sell_euro ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                        <input name="treasury_sell_dollar" type="number" step="0.001" min="0" value="{{ $setting->treasury_sell_dollar ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="wallet_reserve" type="number" step="0.01" min="0" value="{{ $setting->wallet_reserve ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <input name="transaction_fee_percent" type="number" step="0.01" min="0" value="{{ $setting->transaction_fee_percent ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />

                        <input name="sort_order" type="number" min="0" value="{{ $setting->sort_order ?? 0 }}"
                            class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm" />
                        <select name="is_active" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">
                            <option value="1" @selected($setting->is_active)>active</option>
                            <option value="0" @selected(!$setting->is_active)>inactive</option>
                        </select>
                        <div></div>

                        <textarea name="description" rows="2" class="md:col-span-3 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm">{{ $setting->description }}</textarea>

                        <div class="md:col-span-3 flex items-center gap-2">
                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-slate-900 text-white text-xs">Update</button>
                    </form>
                            @if ((string) $setting->_id !== (string) $defaultSetting->_id)
                                <form method="POST" action="{{ route('zercash.settings.destroy', $setting->_id) }}"
                                    onsubmit="return confirm('Delete this setting?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-600 text-white text-xs">Delete</button>
                                </form>
                            @endif
                        </div>
                </div>
            @endforeach
        </section>
    </main>
@endsection
