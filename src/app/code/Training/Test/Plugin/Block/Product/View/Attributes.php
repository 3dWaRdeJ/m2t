<?php

namespace Training\Test\Plugin\Block\Product\View;

class Attributes
{
    public function afterToHtml(
        \Magento\Catalog\Block\Product\View\Attributes $subject,
        $result
    ) {
        $result = '<div>' . $subject->getTemplate() . '</div>' . $result;
        return $result;
    }
}
