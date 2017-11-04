<?php

namespace feedly\Models;

class Search extends FeedlyModel
{
    public function getEndpoint()
    {
        return '/v3/search/feeds';
    }

    public function get($input = [])
    {
        if (!isset($input['query'])) {
            return false;
        }
        $query = http_build_query($input);
        return $this->getClient()
            ->get($this->getApiBaseUrl() . $this->getEndpoint() . '?' . $query);
    }
}
