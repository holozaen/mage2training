<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 08.04.16
 * Time: 14:34
 */

namespace Training\CartInfo\Helper;
use Magento\Checkout\Model\Cart;
use Magento\Quote\Api\Data\CartItemInterface; //Interface hat nicht funktioniert (immer leer)


class QuoteInfo
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * QuoteInfo constructor.
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
        return array_filter(/**
         * @param CartItemInterface $item
         * @return bool
         */
            $itemCollection->getItems(),function(CartItemInterface $item){
            return !$item->getParentItem();
        });

    }

}