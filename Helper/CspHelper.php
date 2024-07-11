<?php

namespace Scommerce\CspHelper\Helper;

use Magento\Framework\App\Helper\Context;

if (class_exists('Magento\Csp\Helper\CspNonceProvider')) {
    class CspHelperMiddle extends \Magento\Csp\Helper\CspNonceProvider { }
} else {
    class CspHelperMiddle {
        public function generateNonce() {
            return false;
        }
    }
}

class CspHelper extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $cspHelperMiddle;

    public function __construct(
        Context $context,
        CspHelperMiddle $cspHelperMiddle
    ) {
        parent::__construct($context);
        $this->cspHelperMiddle = $cspHelperMiddle;
    }

    public function generateNonce(): string
    {
        $nonce = $this->cspHelperMiddle->generateNonce();
        if ($nonce) {
            return " nonce=\"" . $nonce . "\"";
        } else {
            return '';
        }
    }
}
