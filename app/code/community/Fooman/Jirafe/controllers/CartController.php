<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @package     Fooman_Jirafe
 * @copyright   Copyright (c) 2010 Jirafe Inc (http://www.jirafe.com)
 * @copyright   Copyright (c) 2010 Fooman Limited (http://www.fooman.co.nz)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Fooman_Jirafe_CartController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $recovered = false;
        $visitorId = $this->getRequest()->getParam('visitor_id');
        if ($visitorId) {
            $recovered = Mage::getModel('foomanjirafe/cart')->recover($visitorId);
        }

        if ($recovered) {
            $this->_redirect('checkout/cart/*');
        } else {
            //could not recover - redirect to homepage
            $this->_redirect('/');
        }
    }

}
