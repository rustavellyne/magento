<?php


namespace Unit1\Plugins\Plugin;

/**
 * Class AroundBreadcrumbsPlugin
 * @package Unit1\Plugins\Plugin
 */
class AroundBreadcrumbsPlugin
{
    /**
    * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
    * @param callable $proceed
    * @param $crumbName
    * @param $crumbInfo
    */
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject, callable $proceed,
        $crumbName, $crumbInfo
    )
    {
        $crumbInfo['label'] = '(!tea)'.$crumbInfo['label'];
        $proceed($crumbName, $crumbInfo);
    }
}