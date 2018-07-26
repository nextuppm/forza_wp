<?php
class ProductManager
{
    private $_repository;
    private $_bulkRepository;
    protected static $ProductBulkCache;

    public function ProductManager($repository, $bulkRepository)
    {
        if ($repository == null) throw new InvalidArgumentException("Invalid repository");
        if ($bulkRepository == null) throw new InvalidArgumentException("Invalid bulkRepository");
        $this->_repository = $repository;
        $this->_bulkRepository = $bulkRepository;
    }

    public static function GetBulk($productId, $bulkFileId = null)
    {
        require_once 'wp-content/themes/forzatheme/includes/FileCache.php';
        $cache = new FileCache();
        
        if ($cache->fetch($productId))
        {
            $bulkValue = $cache->fetch($productId);
            if (($bulkFileId == null || $bulkValue['Item1'] == $bulkFileId) && !empty($bulkValue['Item2']))
            {
                return $bulkValue['Item2'];
            }
        }

        $client = new ApiClient();
        $bulk = $client->getProductRepository()->getProductBulk($productId);
        $newBulkValue = array('Item1'=>$bulkFileId,'Item2'=>$bulk);
        if ($cache->fetch($productId))
        {
            $cache->store($productId,$newBulkValue,86400);
        }
        else
        {
            $cache->store($productId,$newBulkValue,86400);
        }

        return $bulk;
    }

}