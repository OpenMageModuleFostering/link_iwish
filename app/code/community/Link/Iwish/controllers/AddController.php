<?php
/**
 * Created by PhpStorm.
 * User: gvhoecke
 * Date: 04/12/13
 * Time: 10:49
 */

class Link_Iwish_AddController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $coupon_code = $this->getRequest()->getParam( 'coupon_code' ); //To automatically apply a coupon code

        if( $coupon_code != '' ) {

            Mage::getSingleton( 'checkout/session' )->setData( 'coupon_code', $coupon_code );
            Mage::getSingleton( 'checkout/cart' )->getQuote()->setCouponCode( $coupon_code )->save();
            Mage::getSingleton( 'core/session' )->addSuccess( $this->__( 'Coupon was automatically applied' ) );
        }

        $product_id = $this->getRequest()->getParam( 'product' );
        $qty = $this->getRequest()->getParam( 'qty' ); //Used if your qty is not hard coded
        $cart = Mage::getModel( 'checkout/cart' );
        $cart->init();

        if( $product_id == '' ) {

            $this->_redirect( '/' );
        }

        $productModel = Mage::getModel( 'catalog/product' )->load( $product_id );

        if( TRUE ) {

            try {

                $cart->addProduct( $productModel, array( 'qty' => '1' ) ); //qty is hard coded
            }
            catch( Exception $e ) {

                $this->_redirect( '/' );
            }
        }

        $cart->save();

        if( $this->getRequest()->isXmlHttpRequest() ) {

            exit( '1' );
        }

        $this->_redirect( 'checkout/cart' );
    }
}