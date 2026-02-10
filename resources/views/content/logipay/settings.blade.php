@extends('layouts/layoutMaster')

@section('title', 'Zercash Settings')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script> --}}
@endsection

@section('content')
    <!-- Main Content -->
    <main class="flex-1 bg-gradient-to-br from-slate-50 to-slate-100 p-6 overflow-auto">
        <div class="flex gap-6 mx-auto">

            <!-- Left Menu Card -->
            <div class="w-48 shrink-0 bg-white rounded-xl shadow-md p-4 h-fit">
                <h2 class="font-bold text-sm text-slate-800 mb-3 px-2">Zer Settings</h2>
                <nav class="space-y-0.5" id="settingsMenu">
                    <button onclick="switchTab('zer')" data-tab="zer"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-amber-600 font-medium bg-amber-50">Zer
                        Settings</button>
                    <button onclick="switchTab('treasur')" data-tab="treasur"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">Treasur
                        Setting</button>
                    <button onclick="switchTab('transactions')" data-tab="transactions"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">Trasnactions
                        Fee</button>
                    <button onclick="switchTab('reseller')" data-tab="reseller"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">Reseller
                        Prices</button>
                    <button onclick="switchTab('wallet')" data-tab="wallet"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">Wallet
                        Setting</button>
                    <button onclick="switchTab('shop')" data-tab="shop"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">Shop
                        Settings</button>
                    <button onclick="switchTab('system')" data-tab="system"
                        class="settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50">System
                        Setting</button>
                </nav>
            </div>

            <!-- Right Content Card -->
            <div class="flex-1 bg-white rounded-xl shadow-md p-6">

                <!-- Section: Zer Settings -->
                <div id="panel-zer" class="settings-panel">
                    <div class="space-y-8">
                        <!-- Allowed Currency -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Allowed Currency</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="bg-slate-50/80 rounded-lg p-3">
                                    <p class="text-[11px] text-slate-400 uppercase tracking-wide mb-2">Select Euro</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium">Euro &euro;</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="bg-slate-50/80 rounded-lg p-3">
                                    <p class="text-[11px] text-slate-400 uppercase tracking-wide mb-2">Select Dollar</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium">Dollar $</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="flex items-center gap-1.5 text-amber-500 hover:text-amber-600 text-sm font-medium mx-auto transition-colors">
                                <i data-lucide="save" class="w-3.5 h-3.5"></i>
                                Save
                            </button>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- Backing Value -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Backing Value</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-2">Z&ecirc;r to Euro</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">&euro;</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.010" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,010</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-2">Z&ecirc;r to Dollar</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">$</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.000" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,000</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- Treasury Sell Price -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Treasury Sell Price</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-2">Z&ecirc;r to Euro</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">&euro;</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.012" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,012</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-2">Z&ecirc;r to Dollar</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">$</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.000" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,000</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Treasur Setting -->
                <div id="panel-treasur" class="settings-panel hidden">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-slate-700">Teasur reserve</h3>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div
                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                            </div>
                        </label>
                    </div>
                    <p class="text-xs text-slate-400 mb-4">Set the Reserve for Treasur</p>
                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                        <span class="flex-1"></span>
                        <span class="text-rose-500 font-semibold">%</span>
                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                            data-value="0.01" data-step="0.01" data-decimals="2">
                            <span
                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                            <div class="flex flex-col -my-0.5">
                                <button onclick="counterIncrement(this)"
                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                        data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                <button onclick="counterDecrement(this)"
                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                        data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Transactions Fee -->
                <div id="panel-transactions" class="settings-panel hidden">
                    <div class="space-y-8">
                        <!-- Internal Payments -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Internal Payments</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Playlist Purchase</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Stream Purchase</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Upgrade Account</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- External Payments -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">External Payments</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Playlist Purchase</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Stream Purchase</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-[11px] text-slate-400 mb-1.5">Payment Fee</p>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <span class="text-sm flex-1">Upgrade Account</span>
                                        <span class="text-rose-500 font-semibold">%</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.01" data-step="0.01" data-decimals="2">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Reseller Prices -->
                <div id="panel-reseller" class="settings-panel hidden">
                    <div class="space-y-8">
                        <!-- Salemanager Prices -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Salemanager Prices</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Euro</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">&euro;</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.012" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,012</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Dollar</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">$</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.000" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,000</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- Partnershop Prices -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Partnershop Prices</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Euro</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">&euro;</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.014" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,014</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Dollar</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">$</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.000" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,000</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <!-- WebApp YekBun -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">WebApp YekB&ucirc;n</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Euro</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">&euro;</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.016" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,016</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <p class="text-[11px] text-slate-400">Z&ecirc;r to Dollar</p>
                                        <p class="text-[11px] text-slate-400">min. 0,014</p>
                                    </div>
                                    <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                        <span class="text-sm font-medium flex-1">1 Z&ecirc;r</span>
                                        <span class="text-emerald-500 font-semibold">$</span>
                                        <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                            data-value="0.000" data-step="0.001" data-decimals="3">
                                            <span
                                                class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,000</span>
                                            <div class="flex flex-col -my-0.5">
                                                <button onclick="counterIncrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-up"
                                                        class="w-3 h-3 text-emerald-500"></i></button>
                                                <button onclick="counterDecrement(this)"
                                                    class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                        data-lucide="chevron-down"
                                                        class="w-3 h-3 text-rose-500"></i></button>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Wallet Setting -->
                <div id="panel-wallet" class="settings-panel hidden">
                    <div class="space-y-8">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Z&ecirc;r Gift</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set Zer Amount each user</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Max. Amount of Z&ecirc;r</span>
                                <span class="text-rose-500 font-semibold">%</span>
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Wallet reserve</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set reserve of Walletz</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Set Reserver</span>
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Shop Settings -->
                <div id="panel-shop" class="settings-panel hidden">
                    <div class="space-y-8">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Payout Fee</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set Payout Fee</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Shop Payout Fee</span>
                                <span class="text-rose-500 font-semibold">%</span>
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Shop Wallet</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set Wallet reserver</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Set reserve</span>
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: System Setting -->
                <div id="panel-system" class="settings-panel hidden">
                    <div class="space-y-8">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Transaction Alert</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set reserver of walletz</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Playlist Purchase</span>
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-slate-700">Transaction Alert</h3>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:after:translate-x-full">
                                    </div>
                                </label>
                            </div>
                            <p class="text-xs text-slate-400 mb-4">Set reserver of walletz</p>
                            <div class="flex items-center gap-3 bg-slate-50/80 rounded-lg px-4 py-3">
                                <span class="text-sm flex-1">Playlist Purchase</span>
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                                <div class="counter-input inline-flex items-center gap-1 bg-white rounded-md px-2.5 py-1 border border-slate-200 shadow-sm"
                                    data-value="0.01" data-step="0.01" data-decimals="2">
                                    <span
                                        class="text-sm font-medium tabular-nums min-w-[45px] text-center counter-display">0,01</span>
                                    <div class="flex flex-col -my-0.5">
                                        <button onclick="counterIncrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-up" class="w-3 h-3 text-emerald-500"></i></button>
                                        <button onclick="counterDecrement(this)"
                                            class="hover:bg-slate-100 rounded-sm p-0.5 transition-colors"><i
                                                data-lucide="chevron-down" class="w-3 h-3 text-rose-500"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.settings-panel').forEach(function(panel) {
                panel.classList.add('hidden');
            });
            document.getElementById('panel-' + tabId).classList.remove('hidden');

            document.querySelectorAll('.settings-menu-btn').forEach(function(btn) {
                btn.className =
                    'settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50';
            });
            document.querySelector('[data-tab="' + tabId + '"]').className =
                'settings-menu-btn w-full text-left px-3 py-2 rounded-md text-[13px] transition-all duration-200 text-amber-600 font-medium bg-amber-50';
        }

        function getCounterContainer(btn) {
            return btn.closest('.counter-input');
        }

        function formatCounter(val, decimals) {
            return val.toFixed(decimals).replace('.', ',');
        }

        function counterIncrement(btn) {
            var container = getCounterContainer(btn);
            var step = parseFloat(container.dataset.step);
            var decimals = parseInt(container.dataset.decimals);
            var value = parseFloat(container.dataset.value);
            var multiplier = Math.pow(10, decimals);
            value = Math.round((value + step) * multiplier) / multiplier;
            container.dataset.value = value;
            container.querySelector('.counter-display').textContent = formatCounter(value, decimals);
        }

        function counterDecrement(btn) {
            var container = getCounterContainer(btn);
            var step = parseFloat(container.dataset.step);
            var decimals = parseInt(container.dataset.decimals);
            var value = parseFloat(container.dataset.value);
            var multiplier = Math.pow(10, decimals);
            value = Math.max(0, Math.round((value - step) * multiplier) / multiplier);
            container.dataset.value = value;
            container.querySelector('.counter-display').textContent = formatCounter(value, decimals);
        }
    </script>

    <script>
        lucide.createIcons();
    </script>

@endsection
