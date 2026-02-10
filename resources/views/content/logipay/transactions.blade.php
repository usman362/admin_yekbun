@extends('layouts/layoutMaster')

@section('title', 'Zercash Transactions')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script> --}}
@endsection

@section('content')

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">

        <!-- Transactions Card -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

            <!-- Header -->
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 border-b border-slate-100 gap-3">
                <div>
                    <div class="flex items-center gap-2 relative">
                        <h2 class="text-lg font-semibold text-slate-900">Transactions overview</h2>
                        <button onclick="toggleDropdown()" class="text-amber-500">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                        <div id="viewDropdown"
                            class="hidden absolute top-full left-0 mt-1 bg-white border border-slate-200 rounded-lg shadow-lg py-1 z-10">
                            <button onclick="selectView('Daily')"
                                class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Daily</button>
                            <button onclick="selectView('Monthly')"
                                class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Monthly</button>
                            <button onclick="selectView('Yearly')"
                                class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Yearly</button>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500">Daily Transactions · Total Transkations: 35</p>
                </div>
                <div class="flex items-center gap-2">
                    <button
                        class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium border border-slate-200 rounded-lg text-slate-700 hover:bg-slate-50">
                        Sort by Date
                    </button>
                    <div class="relative">
                        <i data-lucide="search"
                            class="absolute left-2.5 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-slate-400"></i>
                        <input type="text" placeholder="Search"
                            class="pl-8 h-8 text-xs w-32 border border-slate-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 px-3">
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left p-4 text-xs font-medium text-slate-400">#</th>
                            <th class="text-left p-4 text-xs font-medium text-slate-400">Date</th>
                            <th class="text-center p-4 text-xs font-medium text-slate-400">Transactions</th>
                            <th class="text-center p-4 text-xs font-medium text-slate-400">Internal Paid</th>
                            <th class="text-center p-4 text-xs font-medium text-slate-400">External Paid</th>
                            <th class="text-center p-4 text-xs font-medium text-slate-400">Cashback</th>
                            <th class="text-center p-4 text-xs font-medium text-slate-400">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 01 -->
                        <tr class="border-b border-slate-50">
                            <td class="p-4 text-sm font-medium text-slate-900">01</td>
                            <td class="p-4 text-sm text-slate-500">DD/MM/YYYY</td>
                            <td class="p-4 text-center">
                                <span
                                    class="text-sm font-semibold text-amber-500 cursor-pointer hover:text-amber-600 border border-transparent hover:border-amber-500 px-2 py-0.5 rounded transition-all">10</span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">100,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">4 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 100 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">100,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">6 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 50 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                    <span class="text-sm font-semibold text-slate-900">150,00</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">200,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">10 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 150 CB</span>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 02 -->
                        <tr class="border-b border-slate-50">
                            <td class="p-4 text-sm font-medium text-slate-900">02</td>
                            <td class="p-4 text-sm text-slate-500">DD/MM/YYYY</td>
                            <td class="p-4 text-center">
                                <span
                                    class="text-sm font-semibold text-amber-500 cursor-pointer hover:text-amber-600 border border-transparent hover:border-amber-500 px-2 py-0.5 rounded transition-all">10</span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">200,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">1 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 75 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">100,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">9 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 75 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                    <span class="text-sm font-semibold text-slate-900">150,00</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">200,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">10 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 150 CB</span>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 03 -->
                        <tr class="border-b border-slate-50">
                            <td class="p-4 text-sm font-medium text-slate-900">03</td>
                            <td class="p-4 text-sm text-slate-500">DD/MM/YYYY</td>
                            <td class="p-4 text-center">
                                <span
                                    class="text-sm font-semibold text-amber-500 cursor-pointer hover:text-amber-600 border border-transparent hover:border-amber-500 px-2 py-0.5 rounded transition-all">15</span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">50,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">10 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 80 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">100,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">4 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 70 CB</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                    <span class="text-sm font-semibold text-slate-900">150,00</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">200,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">10 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 150 CB</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-slate-50">
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-xs font-medium text-slate-400">Total</span>
                                    <span class="text-sm font-semibold text-amber-500">30</span>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-xs font-medium text-slate-400">Total</span>
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">300,00</span>
                                        <span class="text-xs text-amber-500">Zêr</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-xs font-medium text-slate-400">Total</span>
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">300,00</span>
                                        <span class="text-xs text-amber-500">Zêr</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-xs font-medium text-slate-400">Total</span>
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">450,00</span>
                                        <span class="text-xs text-amber-500">CB</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center gap-1">
                                        <img src="{{asset('images/currency-icon.svg')}}" class="w-3 h-3 inline" />
                                        <span class="text-sm font-semibold text-slate-900">600,00</span>
                                    </div>
                                    <span class="text-[10px] text-amber-500">10 TA <img src="{{asset('images/currency-icon.svg')}}"
                                            class="w-2 h-2 inline" /> 450 CB</span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

    </main>

    <script>
    lucide.createIcons();

    function toggleDropdown() {
      var dropdown = document.getElementById('viewDropdown');
      dropdown.classList.toggle('hidden');
    }

    function selectView(view) {
      document.getElementById('viewDropdown').classList.add('hidden');
    }

    document.addEventListener('click', function(e) {
      var dropdown = document.getElementById('viewDropdown');
      if (!e.target.closest('#viewDropdown') && !e.target.closest('[onclick="toggleDropdown()"]')) {
        dropdown.classList.add('hidden');
      }
    });
  </script>

@endsection
