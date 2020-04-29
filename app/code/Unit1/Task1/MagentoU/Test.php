<?php


namespace Unit1\Task1\MagentoU;


/**
 * Class Test
 * @package Unit1\Task1\MagentoU
 */
class Test
{
    /**
     * @var bool
     */
    protected $justAParameter;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \Unit1\Task1\Api\ProductRepositoryInterface
     */
    protected $unit1ProductRepository;

    /**
     * Test constructor.
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Checkout\Model\Session $session
     * @param \Unit1\Task1\Api\ProductRepositoryInterface $unit1ProductRepository
     * @param bool $justAParameter
     * @param array $data
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Checkout\Model\Session $session,
        \Unit1\Task1\Api\ProductRepositoryInterface $unit1ProductRepository,
        $justAParameter = false,
        array $data = []
    ) {
        $this->logger = $logger;
        $this->justAParameter = $justAParameter;
        $this->data = $data;
        $this->unit1ProductRepository = $unit1ProductRepository;
        $this->logger->critical(
            $justAParameter
        );

    }
}