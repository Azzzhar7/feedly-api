<?php

namespace feedly\Models;

class Search extends FeedlyModel
{
    public function getEndpoint()
    {
        return '/v3/search/feeds';
    }

    public function get($query, $input = [])
    {
        $query = http_build_query(['query' => $query] + $input);
        return $this->getClient()
            ->get($this->getApiBaseUrl() . $this->getEndpoint() . '?' . $query);
    }
}
