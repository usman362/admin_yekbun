<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Shop;
use App\Models\SiteSetting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\ZercashProduct;
use App\Models\ZercashSaleManager;
use App\Models\ZercashSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZercashApiController extends Controller
{
    /**
     * GET /api/zercash/products
     * Fetch all active products, optionally filtered by category.
     *
     * Query params: ?category=choose_your_plan
     */
    public function products(Request $request)
    {
        $query = ZercashProduct::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name');

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->get();

        return ResponseHelper::sendResponse($products, 'Products fetched successfully.');
    }

    /**
     * GET /api/zercash/products/{id}
     * Fetch a single product by ID.
     */
    public function productDetail($id)
    {
        $product = ZercashProduct::with('setting')->find($id);

        if (!$product) {
            return ResponseHelper::sendResponse([], 'Product not found.', false, 404);
        }

        return ResponseHelper::sendResponse($product, 'Product fetched successfully.');
    }

    /**
     * GET /api/zercash/categories
     * Fetch distinct product categories.
     */
    public function categories()
    {
        $categories = ZercashProduct::where('status', 'active')
            ->distinct('category')
            ->get();

        return ResponseHelper::sendResponse($categories, 'Categories fetched successfully.');
    }

    /**
     * GET /api/zercash/settings
     * Fetch active Zercash settings (exchange rates, currencies, etc.)
     */
    public function settings()
    {
        $settings = ZercashSetting::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return ResponseHelper::sendResponse($settings, 'Settings fetched successfully.');
    }

    /**
     * GET /api/zercash/plans
     * Fetch subscription plans (products in 'choose_your_plan' category).
     */
    public function plans()
    {
        $plans = ZercashProduct::where('category', 'choose_your_plan')
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        return ResponseHelper::sendResponse($plans, 'Plans fetched successfully.');
    }

    /**
     * GET /api/zercash/shops
     * Fetch partner shops list.
     */
    public function shops(Request $request)
    {
        $query = Shop::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $shops = $query->orderBy('created_at', 'desc')->paginate($request->get('limit', 20));

        return ResponseHelper::sendResponse($shops, 'Shops fetched successfully.');
    }

    /**
     * GET /api/zercash/sale-managers
     * Fetch sale managers list.
     */
    public function saleManagers()
    {
        $managers = ZercashSaleManager::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        return ResponseHelper::sendResponse($managers, 'Sale managers fetched successfully.');
    }

    /**
     * GET /api/zercash/wallet
     * Fetch authenticated user's wallet info.
     */
    public function wallet()
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not found.', false, 404);
        }

        $setting = ZercashSetting::where('key', 'general')->where('is_active', true)->first();

        $wallet = [
            'balance' => $user->wallet_balance ?? 0,
            'zer_balance' => $user->zer_balance ?? 0,
            'cashback_percent' => $setting->transaction_fee_percent ?? 5,
            'currency' => $setting->default_currency ?? 'EUR',
            'zer_to_euro' => $setting->zer_to_euro ?? 0.01,
            'zer_to_dollar' => $setting->zer_to_dollar ?? 0,
        ];

        return ResponseHelper::sendResponse($wallet, 'Wallet fetched successfully.');
    }

    /**
     * GET /api/zercash/wallet/transactions
     * Fetch authenticated user's transaction history.
     */
    public function walletTransactions(Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('limit', 20));

        return ResponseHelper::sendResponse($transactions, 'Transactions fetched successfully.');
    }

    /**
     * POST /api/zercash/subscription/update
     * Update user's subscription settings (auto-renew toggle, plan change).
     */
    public function updateSubscription(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return ResponseHelper::sendResponse([], 'User not found.', false, 404);
        }

        if ($request->has('auto_renew')) {
            $user->auto_renew = (bool) $request->auto_renew;
        }

        if ($request->has('subscription_type')) {
            $user->subscription_type = $request->subscription_type;
        }

        $user->save();

        return ResponseHelper::sendResponse([
            'subscription_type' => $user->subscription_type,
            'auto_renew' => $user->auto_renew ?? false,
            'expired_at' => $user->expired_at,
            'user_type' => $user->user_type,
        ], 'Subscription updated successfully.');
    }

    /**
     * GET /api/zercash/faqs
     * Fetch FAQs, optionally filtered by category.
     *
     * Query params: ?category=general
     */
    public function faqs(Request $request)
    {
        $query = Faq::where('status', 'active')->orderBy('sort_order');

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $faqs = $query->get();

        return ResponseHelper::sendResponse($faqs, 'FAQs fetched successfully.');
    }

    /**
     * GET /api/zercash/site-settings
     * Fetch public site settings (company info, social links, download URLs).
     */
    public function siteSettings()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');

        return ResponseHelper::sendResponse($settings, 'Site settings fetched successfully.');
    }
}
