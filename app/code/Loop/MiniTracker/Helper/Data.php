<?php
namespace Loop\MiniTracker\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $_curl;

    /**
     *
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $_jsonSerializer;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\HTTP\Client\Curl $curl
     * @param \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $curl,
        \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
    ) {
        $this->_curl = $curl;
        $this->_jsonSerializer = $jsonSerializer;
        parent::__construct($context);
    }

    /**
     * Call Api by using Curl.
     *
     * @return \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
     */
    public function hitTheAPI()
    {

        $url = 'https://supertracking.view.agentur-loop.com/trackme';
        $params = $this->_jsonSerializer->serialize([
            'sku' => 'EN0005785',
            'price' => '10.0'
        ]);

        $this->_curl->post($url, $params);
        return $this->_jsonSerializer->unserialize($this->_curl->getBody());
    }
}
