# CSP Helper Extension

This Magento 2 extension helps you resolve Content Security Policy (CSP) issues caused by inline JavaScript code in your store. It achieves this by automatically adding a nonce attribute to all your inline script tags.

## Features
•  Automatic nonce generation for inline scripts.

•  Dependency injection for easy integration into your custom code.

•  Improved code maintainability by separating script logic from security concerns.


## Installation
1. Add the repository:

```bash
composer require scommerce/csp-helper
```

2. Include CSP Helper in your helper class as shown below
```bash
use Scommerce\CspHelper\Helper\CspHelper;

protected $cspHelper;

public function __construct(
CspHelper $cspHelper
) {
    $this->cspHelper = $cspHelper;
}

public function getNonce()
{
    return $this->cspHelper->generateNonce();
}
```

3. In your code, wherever a <script> tag is used, incorporate the helper class and append the getNonce function as shown below
```bash
<script type="text/javascript" <?= $helper->getNonce(); ?>>
       // Your script code here
</script>
```

**Important Note**

If the generateNonce() function fails to generate a nonce (potentially on Magento versions 2.4.6 and below), an empty string will be added to the nonce attribute. While this might work in some cases, it's not ideal from a security perspective.

**How it Works**

The extension utilises the **Scommerce\CspHelper\Helper\CspHelper** class. This class injects itself into your Helper, Block, or ViewModel classes using dependency injection. The **getNonce()** function within this class generates a unique, random string called a nonce. This nonce is then added as the nonce attribute to your inline script tags.

**Benefits**

•  Simplifies CSP compliance.

•  Reduces the risk of malicious script execution.

•  Improves code maintainability.

**Need Help**

If you require assistance with implementing this on your website to resolve CSP inline JavaScript errors, feel free to reach out to us via email at [support@scommerce-mage.com](mailto:support@scommerce-mage.com)
.

**Looking for a Complete Solution?**

For a comprehensive resolution of other CSP errors on your site, consider utilizing our [**CSP Whitelist Extension**](https://www.scommerce-mage.com/magento-2-csp-whitelisting.html). It provides the capability to whitelist URLs for any CSP directive directly from the Magento admin panel. Learn more about it [here](https://www.scommerce-mage.com/magento-2-csp-whitelisting.html).


**Disclaimer**

This extension is provided as-is with no warranty. It is recommended to thoroughly test the extension in a development environment before deploying it to a live store.
