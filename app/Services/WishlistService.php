<?php
namespace App\Services;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistService
{
    public function getWishlistItems($userId)
    {
        return Wishlist::where('user_id', $userId)->with('product')->get();
    }

    public function addToWishlist($userId, $productId)
    {
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($wishlistItem) {
            return [
                'success' => false,
                'message' => 'Product is already in your wishlist.',
                'wishlistCount' => $this->getWishlistCount($userId),
            ];
        }

        DB::beginTransaction();
        try {
            Wishlist::create(['user_id' => $userId, 'product_id' => $productId]);
            DB::commit();
            return [
                'success' => true,
                'message' => 'Product added to wishlist successfully!',
                'wishlistCount' => $this->getWishlistCount($userId),
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [ 'success' => false ,'error' => 'Failed to add product to wishlist. Please try again.'];
        }
    }

    public function removeFromWishlist($userId, $productId)
    {
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if (!$wishlistItem) {
            return ['error' => 'Product not found in wishlist.'];
        }

        DB::beginTransaction();
        try {
            $wishlistItem->delete();
            DB::commit();
            return [
                'message' => 'Product removed from wishlist successfully!',
                'wishlistCount' => $this->getWishlistCount($userId),
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['error' => 'Failed to remove product from wishlist. Please try again.'];
        }
    }

    public function getWishlistCount($userId)
    {
        return Wishlist::where('user_id', $userId)->count();
    }
}
