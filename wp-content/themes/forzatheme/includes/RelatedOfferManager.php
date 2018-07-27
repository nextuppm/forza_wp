<?php


class RelatedOfferManager
{
    public static function GetRelatedOffers($clientId, $url)
    {
        $client = new ApiClient();
        return $client->getProductRepository()->getOffers($clientId, $url);
    }
}