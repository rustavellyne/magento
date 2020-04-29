<?php


namespace Unit1\Plugins\Plugin;

use \Psr\Log\LoggerInterface;
/**
 * Class AfterPricePlugin
 * @package Unit1\Plugins\Plugin
 */
class AfterPricePlugin
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return float
     */
    public function afterGetPrice (\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 0.2;
    }
}