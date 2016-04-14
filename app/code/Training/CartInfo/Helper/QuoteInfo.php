<?php

namespace Training\CartInfo\Helper;
use Magento\Checkout\Model\Cart;
use Magento\Quote\Api\Data\CartItemInterface; //Interface did not function (empty)


class QuoteInfo
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * QuoteInfo constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function forCurrentQuote()
    {
        $itemCollection = $this->cart->getItems();
        return !$itemCollection ?
            [] :
            $this->itemCollectionToArray($itemCollection);

    }

    private function itemCollectionToArray($itemCollection)
    {
        return array_values(array_map(function (CartItemInterface $item){
            return [
                'sku' => $item->getSku(),
                'qty' => $item->getQty()
            ];
        },$this->getvisibleItems($itemCollection)));


    }

    private function getvisibleItems($itemCollection)
    {
        return array_filter(
        /**
         * @param CartItemInterface $item
         * @return bool
         */
            $itemCollection->getItems(),function(CartItemInterface $item){
            return !$item->getParentItem();
        });

    }

}