<?

class BulkHelper 
{
    public static function GetBulkForUser($productManager, $relatedOfferManager, $сlientId = null)
    {
        //get user offers
        require_once 'wp-content/themes/forzatheme/includes/RelatedOfferManager.php';
        $userOffers = relatedOfferManager::GetRelatedOffers($сlientId, null);
        
        //find if there is a special offer
        $selectedOffer = false;
        if(isset($userOffers->fixed_offers) && !empty($userOffers->fixed_offers))
        {
            $max_rank = 0;
            foreach ($userOffers->fixed_offers as $fixedOffer) 
            {
                if($fixedOffer->Rank > $max_rank && $fixedOffer->TypeID == Constants::CONSTANTS['OfferType']['Special'])
                {
                    $max_rank = $fixedOffer->Rank;
                    $selectedOffer = $fixedOffer;
                }
            }
            
            if($selectedOffer && $selectedOffer->ProductId != null && $selectedOffer->BulkFileID != null )
            {
                $bulk = productManager::GetBulk($selectedOffer->ProductId, $selectedOffer->BulkFileID);
                //json
                return array(
                    $selectedOffer->ProductId,
                    $bulk,
                    Constants::CONSTANTS['OfferType']['Special'],
                    true,
                    $selectedOffer->Amount,
                    $selectedOffer->Term,
                    $selectedOffer->SpecOfferId
                );
            }
        }
        
        $selectedOffer = false;
        if(isset($userOffers->variable_offers) && !empty($userOffers->variable_offers))
        {
            $max_rank = 0;
            foreach ($userOffers->variable_offers as $variableOffer) 
            {
                if($variableOffer->Rank > $max_rank)
                {
                    $max_rank = $variableOffer->Rank;
                    $selectedOffer = $variableOffer;
                }
            }
            
            if($selectedOffer && $selectedOffer->ProductId != null && $selectedOffer->BulkFileID != null )
            {
                require_once 'wp-content/themes/forzatheme/includes/ProductManager.php';
                $bulk = productManager::GetBulk($selectedOffer->ProductId, $selectedOffer->BulkFileID);
                
                //json
                return array(
                    $selectedOffer->ProductId,
                    $bulk,
                    Constants::CONSTANTS['OfferType']['Variable'],
                    false
                );
            }
        }
        
        var_dump($userOffers);
        die();

        //json
        return null;
    }
}
