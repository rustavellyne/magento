<?php


namespace Unit1\Plugins\Plugin;

/**
 * Class AfterFooterPlugin
 * @package Unit1\Plugins\Plugin
 */
class AfterFooterPlugin
{
    /**
     * @param \Magento\Theme\Block\Html\Footer $subject
     * @param $result
     * @return string
     */
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return 'YES! Customized copyright!';
    }
}