@extends('layouts/layoutMaster')

@section('title', 'Zercash Overview')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script> --}}
@endsection

@section('content')


    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6 overflow-auto">

        <!-- Top Stats Row -->
        <div class="grid grid-cols-7 gap-3">
            <!-- Upgrades -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <span class="text-blue-600 font-bold text-sm">U</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">Upgrades</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- Playlists -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center">
                        <span class="text-pink-600 font-bold text-sm">P</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">Playlists</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- YekbûnTV -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-cyan-100 flex items-center justify-center">
                        <span class="text-cyan-600 font-bold text-sm">Y</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">YekbûnTV</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- Streaming -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                        <span class="text-yellow-600 font-bold text-sm">S</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">Streaming</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- Zêr Package -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        <span class="text-red-600 font-bold text-sm">Z</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">Zêr Package</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- External -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center">
                        <span class="text-amber-600 font-bold text-sm">E</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">External</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
            <!-- Internal -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-3">
                <div class="flex flex-col items-center text-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                        <span class="text-green-600 font-bold text-sm">I</span>
                    </div>
                    <p class="text-xs font-medium text-slate-500">Internal</p>
                    <div class="flex items-center gap-1">
                        <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                        <span class="text-sm font-semibold text-slate-900">31,863</span>
                        <span class="text-xs text-green-500">+25%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wallet Cards Row -->
        <div class="grid grid-cols-5 gap-3">
            <!-- Total Zêr -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="text-sm text-slate-500 mb-2">Total Zêr</p>
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                    <span class="text-xl font-bold text-slate-900">999.000.000,00</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">€ 9.990.000,00</span>
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">1 Zêr = 0,01 €</span>
                </div>
            </div>
            <!-- Cashback overview -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="text-sm text-slate-500 mb-2">Cashback overview</p>
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                    <span class="text-xl font-bold text-slate-900">999.000.000,00</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">€ 9.990.000,00</span>
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">1 Zêr = 0,01 €</span>
                </div>
            </div>
            <!-- Payout Wallets -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="text-sm text-slate-500 mb-2">Payout Wallets</p>
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                    <span class="text-xl font-bold text-slate-900">999.000.000,00</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="bg-amber-100 text-amber-700 px-2 py-0.5 text-xs rounded-full">10 Requests</span>
                </div>
            </div>
            <!-- Fee Wallet -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="text-sm text-slate-500 mb-2">Fee Wallet</p>
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                    <span class="text-xl font-bold text-slate-900">999.000.000,00</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">€ 9.990.000,00</span>
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">1 Zêr = 0,01 €</span>
                </div>
            </div>
            <!-- Tax Wallet -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="text-sm text-slate-500 mb-2">Tax Wallet</p>
                <div class="flex items-center gap-1.5 mb-3">
                    <img src="{{asset('images/currency-icon.svg')}}" class="w-5 h-5" />
                    <span class="text-xl font-bold text-slate-900">999.000.000,00</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="bg-green-100 text-green-700 px-2 py-0.5 text-xs rounded-full">€ 9.990.000,00</span>
                    <span class="bg-amber-100 text-amber-700 px-2 py-0.5 text-xs rounded-full">10% Tax</span>
                </div>
            </div>
        </div>

        <!-- Bottom Lists -->
        <div class="grid grid-cols-4 gap-4">

            <!-- Shop Request -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <div class="mb-3">
                    <h3 class="font-semibold text-sm text-slate-900">Shop Request</h3>
                    <p class="text-xs text-slate-500">Total request: 15</p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
                                <span class="text-amber-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
                                <span class="text-amber-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
                                <span class="text-amber-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
                                <span class="text-amber-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                </div>
            </div>

            <!-- New Wallets -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <div class="mb-3">
                    <h3 class="font-semibold text-sm text-slate-900">New Wallets</h3>
                    <p class="text-xs text-slate-500">Total request: 15</p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">U</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Username</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                                <p class="text-[10px] text-slate-400">KU-RA •••• •••• ••••</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-slate-900 flex items-center gap-0.5">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                100.00
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">U</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Username</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                                <p class="text-[10px] text-slate-400">KU-RA •••• •••• ••••</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-slate-900 flex items-center gap-0.5">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                100.00
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">U</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Username</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                                <p class="text-[10px] text-slate-400">KU-RA •••• •••• ••••</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-slate-900 flex items-center gap-0.5">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                100.00
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">U</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Username</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                                <p class="text-[10px] text-slate-400">KU-RA •••• •••• ••••</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-slate-900 flex items-center gap-0.5">
                                <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3" />
                                100.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Best Seller -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <div class="mb-3">
                    <h3 class="font-semibold text-sm text-slate-900">Best Seller</h3>
                    <p class="text-xs text-slate-500">Total request: 15</p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i data-lucide="coins" class="w-4 h-4 text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Zêr Package</p>
                                <p class="text-xs text-slate-500">Gold Package</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500 flex items-center gap-1">
                                <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                                31,863
                                <span class="text-green-500">+25%</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i data-lucide="coins" class="w-4 h-4 text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Zêr Package</p>
                                <p class="text-xs text-slate-500">Gold Package</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500 flex items-center gap-1">
                                <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                                31,863
                                <span class="text-green-500">+25%</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i data-lucide="coins" class="w-4 h-4 text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Zêr Package</p>
                                <p class="text-xs text-slate-500">Gold Package</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500 flex items-center gap-1">
                                <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                                31,863
                                <span class="text-green-500">+25%</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i data-lucide="coins" class="w-4 h-4 text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Zêr Package</p>
                                <p class="text-xs text-slate-500">Silver Package</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500 flex items-center gap-1">
                                <i data-lucide="trending-up" class="w-3 h-3 text-green-500"></i>
                                31,863
                                <span class="text-green-500">+25%</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payout Request -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <div class="mb-3">
                    <h3 class="font-semibold text-sm text-slate-900">Payout Request</h3>
                    <p class="text-xs text-slate-500">Total request: 15</p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 text-xs font-bold">S</span>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Shopname</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                                    Rojava · Qamishlo
                                </p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <script>lucide.createIcons();</script>

@endsection
