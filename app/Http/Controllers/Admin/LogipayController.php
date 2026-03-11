<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZercashProduct;
use App\Models\ZercashSaleManager;
use App\Models\ZercashSetting;
use Illuminate\Http\Request;

class LogipayController extends Controller
{
    public function zer_overview()
    {
        return view('content.logipay.index');
    }

    public function transactions()
    {
        return view('content.logipay.transactions');
    }

    public function products()
    {
        $defaultSetting = $this->ensureDefaultSetting();
        $this->seedDefaultProductsIfEmpty((string) $defaultSetting->_id);

        ZercashProduct::whereNull('setting_id')->update(['setting_id' => (string) $defaultSetting->_id]);

        $settings = ZercashSetting::orderBy('sort_order')->orderBy('label')->get();
        $products = ZercashProduct::with('setting')->orderBy('sort_order')->orderBy('name')->get();
        $this->seedDefaultSaleManagersIfEmpty();
        $saleManagers = ZercashSaleManager::orderBy('sort_order')->orderBy('name')->get();

        return view('content.logipay.products', [
            'settings' => $settings,
            'products' => $products,
            'groupedProducts' => $products->groupBy('category'),
            'saleManagers' => $saleManagers,
        ]);
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'setting_id' => 'nullable|string',
            'category' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|string|max:500',
            'badge' => 'nullable|string|max:100',
            'zer_amount' => 'nullable|numeric|min:0',
            'fiat_amount' => 'nullable|numeric|min:0',
            'fiat_currency' => 'nullable|string|max:10',
            'cashback_percent' => 'nullable|numeric|min:0',
            'songs_count' => 'nullable|integer|min:0',
            'features' => 'nullable|string',
            'status' => 'nullable|string|max:20',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $settingId = $validated['setting_id'] ?? null;
        if ($settingId && !ZercashSetting::find($settingId)) {
            return back()->withErrors(['setting_id' => 'Selected setting does not exist.'])->withInput();
        }

        if (!$settingId) {
            $settingId = (string) $this->ensureDefaultSetting()->_id;
        }

        ZercashProduct::create([
            'setting_id' => $settingId,
            'category' => trim($validated['category']),
            'name' => trim($validated['name']),
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'zer_amount' => $validated['zer_amount'] ?? 0,
            'fiat_amount' => $validated['fiat_amount'] ?? 0,
            'fiat_currency' => strtoupper($validated['fiat_currency'] ?? 'EUR'),
            'cashback_percent' => $validated['cashback_percent'] ?? 0,
            'songs_count' => $validated['songs_count'] ?? 0,
            'features' => $this->parseList($validated['features'] ?? null),
            'status' => $validated['status'] ?? 'active',
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Product created successfully.');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = ZercashProduct::findOrFail($id);

        $validated = $request->validate([
            'setting_id' => 'nullable|string',
            'category' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|string|max:500',
            'badge' => 'nullable|string|max:100',
            'zer_amount' => 'nullable|numeric|min:0',
            'fiat_amount' => 'nullable|numeric|min:0',
            'fiat_currency' => 'nullable|string|max:10',
            'cashback_percent' => 'nullable|numeric|min:0',
            'songs_count' => 'nullable|integer|min:0',
            'features' => 'nullable|string',
            'status' => 'nullable|string|max:20',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $settingId = $validated['setting_id'] ?? null;
        if ($settingId && !ZercashSetting::find($settingId)) {
            return back()->withErrors(['setting_id' => 'Selected setting does not exist.'])->withInput();
        }

        if (!$settingId) {
            $settingId = (string) $this->ensureDefaultSetting()->_id;
        }

        $product->update([
            'setting_id' => $settingId,
            'category' => trim($validated['category']),
            'name' => trim($validated['name']),
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? null,
            'badge' => $validated['badge'] ?? null,
            'zer_amount' => $validated['zer_amount'] ?? 0,
            'fiat_amount' => $validated['fiat_amount'] ?? 0,
            'fiat_currency' => strtoupper($validated['fiat_currency'] ?? 'EUR'),
            'cashback_percent' => $validated['cashback_percent'] ?? 0,
            'songs_count' => $validated['songs_count'] ?? 0,
            'features' => $this->parseList($validated['features'] ?? null),
            'status' => $validated['status'] ?? 'active',
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Product updated successfully.');
    }

    public function destroyProduct($id)
    {
        $product = ZercashProduct::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function storeSaleManager(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:30',
            'city' => 'nullable|string|max:100',
            'zer_in_treasur' => 'nullable|numeric|min:0',
            'total_shops' => 'nullable|integer|min:0',
            'join_date' => 'nullable|date',
            'total_win' => 'nullable|numeric|min:0',
            'image' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|string|max:20',
        ]);

        ZercashSaleManager::create([
            'name' => trim($validated['name']),
            'country' => $validated['country'] ?? 'Rojava',
            'code' => $validated['code'] ?? '11052',
            'city' => $validated['city'] ?? 'Qamishlo',
            'zer_in_treasur' => $validated['zer_in_treasur'] ?? 0,
            'total_shops' => $validated['total_shops'] ?? 0,
            'join_date' => $validated['join_date'] ?? now()->toDateString(),
            'total_win' => $validated['total_win'] ?? 0,
            'image' => $validated['image'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $validated['status'] ?? 'active',
        ]);

        return back()->with('success', 'Sale manager created successfully.');
    }

    public function updateSaleManager(Request $request, $id)
    {
        $manager = ZercashSaleManager::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:30',
            'city' => 'nullable|string|max:100',
            'zer_in_treasur' => 'nullable|numeric|min:0',
            'total_shops' => 'nullable|integer|min:0',
            'join_date' => 'nullable|date',
            'total_win' => 'nullable|numeric|min:0',
            'image' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|string|max:20',
        ]);

        $manager->update([
            'name' => trim($validated['name']),
            'country' => $validated['country'] ?? 'Rojava',
            'code' => $validated['code'] ?? '11052',
            'city' => $validated['city'] ?? 'Qamishlo',
            'zer_in_treasur' => $validated['zer_in_treasur'] ?? 0,
            'total_shops' => $validated['total_shops'] ?? 0,
            'join_date' => $validated['join_date'] ?? now()->toDateString(),
            'total_win' => $validated['total_win'] ?? 0,
            'image' => $validated['image'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $validated['status'] ?? 'active',
        ]);

        return back()->with('success', 'Sale manager updated successfully.');
    }

    public function destroySaleManager($id)
    {
        $manager = ZercashSaleManager::findOrFail($id);
        $manager->delete();

        return back()->with('success', 'Sale manager deleted successfully.');
    }

    public function zer_settings()
    {
        $defaultSetting = $this->ensureDefaultSetting();
        ZercashProduct::whereNull('setting_id')->update(['setting_id' => (string) $defaultSetting->_id]);

        $settings = ZercashSetting::withCount('products')
            ->orderBy('sort_order')
            ->orderBy('label')
            ->get();

        return view('content.logipay.settings', [
            'settings' => $settings,
            'defaultSetting' => $defaultSetting,
        ]);
    }

    public function storeSetting(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|max:100',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'default_currency' => 'required|string|max:10',
            'allowed_currencies' => 'nullable|string|max:100',
            'zer_to_euro' => 'nullable|numeric|min:0',
            'zer_to_dollar' => 'nullable|numeric|min:0',
            'treasury_sell_euro' => 'nullable|numeric|min:0',
            'treasury_sell_dollar' => 'nullable|numeric|min:0',
            'wallet_reserve' => 'nullable|numeric|min:0',
            'transaction_fee_percent' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|in:0,1',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (ZercashSetting::where('key', trim($validated['key']))->exists()) {
            return back()->withErrors(['key' => 'This key already exists.'])->withInput();
        }

        ZercashSetting::create([
            'key' => trim($validated['key']),
            'label' => trim($validated['label']),
            'description' => $validated['description'] ?? null,
            'default_currency' => strtoupper($validated['default_currency']),
            'allowed_currencies' => $this->parseList($validated['allowed_currencies'] ?? null),
            'zer_to_euro' => $validated['zer_to_euro'] ?? 0,
            'zer_to_dollar' => $validated['zer_to_dollar'] ?? 0,
            'treasury_sell_euro' => $validated['treasury_sell_euro'] ?? 0,
            'treasury_sell_dollar' => $validated['treasury_sell_dollar'] ?? 0,
            'wallet_reserve' => $validated['wallet_reserve'] ?? 0,
            'transaction_fee_percent' => $validated['transaction_fee_percent'] ?? 0,
            'is_active' => ($validated['is_active'] ?? '0') === '1',
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Setting created successfully.');
    }

    public function updateSetting(Request $request, $id)
    {
        $setting = ZercashSetting::findOrFail($id);

        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'default_currency' => 'required|string|max:10',
            'allowed_currencies' => 'nullable|string|max:100',
            'zer_to_euro' => 'nullable|numeric|min:0',
            'zer_to_dollar' => 'nullable|numeric|min:0',
            'treasury_sell_euro' => 'nullable|numeric|min:0',
            'treasury_sell_dollar' => 'nullable|numeric|min:0',
            'wallet_reserve' => 'nullable|numeric|min:0',
            'transaction_fee_percent' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|in:0,1',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $setting->update([
            'label' => trim($validated['label']),
            'description' => $validated['description'] ?? null,
            'default_currency' => strtoupper($validated['default_currency']),
            'allowed_currencies' => $this->parseList($validated['allowed_currencies'] ?? null),
            'zer_to_euro' => $validated['zer_to_euro'] ?? 0,
            'zer_to_dollar' => $validated['zer_to_dollar'] ?? 0,
            'treasury_sell_euro' => $validated['treasury_sell_euro'] ?? 0,
            'treasury_sell_dollar' => $validated['treasury_sell_dollar'] ?? 0,
            'wallet_reserve' => $validated['wallet_reserve'] ?? 0,
            'transaction_fee_percent' => $validated['transaction_fee_percent'] ?? 0,
            'is_active' => ($validated['is_active'] ?? '0') === '1',
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Setting updated successfully.');
    }

    public function destroySetting($id)
    {
        $setting = ZercashSetting::findOrFail($id);

        if ($setting->products()->count() > 0) {
            return back()->withErrors([
                'setting' => 'This setting is linked with products. Reassign or delete those products first.',
            ]);
        }

        $setting->delete();

        return back()->with('success', 'Setting deleted successfully.');
    }

    private function ensureDefaultSetting(): ZercashSetting
    {
        return ZercashSetting::firstOrCreate(
            ['key' => 'general'],
            [
                'label' => 'General Zercash Settings',
                'description' => 'Default settings used by Zercash products.',
                'default_currency' => 'EUR',
                'allowed_currencies' => ['EUR', 'USD'],
                'zer_to_euro' => 0.01,
                'zer_to_dollar' => 0,
                'treasury_sell_euro' => 0.012,
                'treasury_sell_dollar' => 0,
                'wallet_reserve' => 0,
                'transaction_fee_percent' => 0,
                'is_active' => true,
                'sort_order' => 0,
            ]
        );
    }

    private function parseList(?string $value): array
    {
        if (!$value) {
            return [];
        }

        return collect(preg_split('/[\r\n,]+/', $value))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function seedDefaultProductsIfEmpty(string $defaultSettingId): void
    {
        if (ZercashProduct::count() > 0) {
            return;
        }

        foreach ($this->defaultZercashProducts() as $item) {
            ZercashProduct::create(array_merge($item, [
                'setting_id' => $defaultSettingId,
                'status' => 'active',
                'sort_order' => $item['sort_order'] ?? 0,
            ]));
        }
    }

    private function defaultZercashProducts(): array
    {
        return [
            ['category' => 'upgrade_music_playlist', 'name' => 'Bronze Playlist', 'image' => 'images/bronze-playlist.svg', 'songs_count' => 50, 'zer_amount' => 1000, 'cashback_percent' => 5, 'sort_order' => 1],
            ['category' => 'upgrade_music_playlist', 'name' => 'Silver Playlist', 'image' => 'images/silver-playlist.svg', 'songs_count' => 75, 'zer_amount' => 1000, 'cashback_percent' => 5, 'sort_order' => 2],
            ['category' => 'upgrade_music_playlist', 'name' => 'Gold Playlist', 'image' => 'images/gold-playlist.svg', 'songs_count' => 100, 'zer_amount' => 1000, 'cashback_percent' => 5, 'sort_order' => 3],

            ['category' => 'choose_your_plan', 'name' => 'Cultivated', 'image' => 'images/Cultivated_service.svg', 'fiat_amount' => 0, 'fiat_currency' => 'EUR', 'description' => 'For individual use with 30 summaries a month, no ads, and basic support.', 'features' => ['Follow Users', 'Enjoy Music', 'Enjoy Videos', 'Standard Wallet', 'Get cashback', 'and more'], 'badge' => 'Current access', 'sort_order' => 10],
            ['category' => 'choose_your_plan', 'name' => 'Educated', 'image' => 'images/Educated_Service.svg', 'fiat_amount' => 25, 'fiat_currency' => 'EUR', 'description' => 'Unlimited summaries, customization, quick support, & app integrations for professionals.', 'features' => ['Follow Users', 'Enjoy Music', 'Enjoy Videos', 'Create Channel', 'Text Comments', 'Voice Comment', 'Business Wallet', 'Get cashback', 'and more'], 'badge' => 'Manage access', 'sort_order' => 11],
            ['category' => 'choose_your_plan', 'name' => 'Academic', 'image' => 'images/Acadmic_Service.svg', 'fiat_amount' => 25, 'fiat_currency' => 'EUR', 'description' => 'Team-focused with priority support, API access, and advanced security options.', 'features' => ['Follow Users', 'Enjoy Music', 'Enjoy Videos', 'Create Channel', 'Text Comments', 'Voice Comment', 'Business Wallet', 'Get cashback', 'and more'], 'badge' => 'Manage access', 'sort_order' => 12],

            ['category' => 'streaming_minutes', 'name' => 'Bronze Stream', 'image' => 'images/bronze-stream.svg', 'songs_count' => 60, 'zer_amount' => 500, 'cashback_percent' => 5, 'sort_order' => 20],
            ['category' => 'streaming_minutes', 'name' => 'Silver Stream', 'image' => 'images/silver-stream.svg', 'songs_count' => 120, 'zer_amount' => 1000, 'cashback_percent' => 5, 'sort_order' => 21],
            ['category' => 'streaming_minutes', 'name' => 'Gold Stream', 'image' => 'images/gold-stream.svg', 'songs_count' => 240, 'zer_amount' => 1500, 'cashback_percent' => 5, 'sort_order' => 22],

            ['category' => 'standard_zer_package', 'name' => 'Bronze', 'image' => 'images/bronze-pack.svg', 'zer_amount' => 1000, 'fiat_amount' => 9.99, 'fiat_currency' => 'EUR', 'sort_order' => 30],
            ['category' => 'standard_zer_package', 'name' => 'Silver', 'image' => 'images/silver-pack.svg', 'zer_amount' => 2500, 'fiat_amount' => 24.99, 'fiat_currency' => 'EUR', 'sort_order' => 31],
            ['category' => 'standard_zer_package', 'name' => 'Gold', 'image' => 'images/gold-pack.svg', 'zer_amount' => 5000, 'fiat_amount' => 49.99, 'fiat_currency' => 'EUR', 'sort_order' => 32],
            ['category' => 'standard_zer_package', 'name' => 'Titanium', 'image' => 'images/titanium-pack.svg', 'zer_amount' => 10000, 'fiat_amount' => 99.99, 'fiat_currency' => 'EUR', 'sort_order' => 33],
            ['category' => 'standard_zer_package', 'name' => 'Platinum', 'image' => 'images/platinum-pack.svg', 'zer_amount' => 25000, 'fiat_amount' => 249.99, 'fiat_currency' => 'EUR', 'sort_order' => 34],
            ['category' => 'standard_zer_package', 'name' => 'Diamond', 'image' => 'images/diamond-pack.svg', 'zer_amount' => 50000, 'fiat_amount' => 499.99, 'fiat_currency' => 'EUR', 'sort_order' => 35],

            ['category' => 'business_zer_package', 'name' => 'Titanium Pack', 'image' => 'images/titanium-pack.svg', 'zer_amount' => 10000, 'fiat_amount' => 99.99, 'fiat_currency' => 'EUR', 'description' => 'Use your Balance on YekBun', 'sort_order' => 40],
            ['category' => 'business_zer_package', 'name' => 'Platinum Pack', 'image' => 'images/platinum-pack.svg', 'zer_amount' => 25000, 'fiat_amount' => 249.99, 'fiat_currency' => 'EUR', 'description' => 'Use your Balance on YekBun', 'sort_order' => 41],
            ['category' => 'business_zer_package', 'name' => 'Diamond Pack', 'image' => 'images/diamond-pack.svg', 'zer_amount' => 50000, 'fiat_amount' => 499.99, 'fiat_currency' => 'EUR', 'description' => 'Use your Balance on YekBun', 'sort_order' => 42],
        ];
    }

    private function seedDefaultSaleManagersIfEmpty(): void
    {
        if (ZercashSaleManager::count() > 0) {
            return;
        }

        $items = [
            ['name' => 'Salemanager Name', 'country' => 'Rojava', 'code' => '11052', 'city' => 'Qamishlo', 'zer_in_treasur' => 5000, 'total_shops' => 20, 'join_date' => '2025-01-01', 'total_win' => 5000, 'sort_order' => 1, 'status' => 'active'],
            ['name' => 'Salemanager Name', 'country' => 'Rojava', 'code' => '11052', 'city' => 'Qamishlo', 'zer_in_treasur' => 5000, 'total_shops' => 20, 'join_date' => '2025-01-01', 'total_win' => 5000, 'sort_order' => 2, 'status' => 'active'],
            ['name' => 'Salemanager Name', 'country' => 'Rojava', 'code' => '11052', 'city' => 'Qamishlo', 'zer_in_treasur' => 5000, 'total_shops' => 20, 'join_date' => '2025-01-01', 'total_win' => 5000, 'sort_order' => 3, 'status' => 'active'],
        ];

        foreach ($items as $item) {
            ZercashSaleManager::create($item);
        }
    }
}
