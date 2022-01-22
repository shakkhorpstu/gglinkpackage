<?php

namespace Mahmud\GglinkTest\Repository;

use GuzzleHttp\Client;

class AuthRepository
{
    /**
     * api call & pass the data to post method
     * get response
     */
    public function login($data)
    {
        $token = $this->requestForToken($data); // get the X-Token

        if($token) {
            $client = new Client(['headers' => [
                'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E',
                'X-Token' => $token
            ]]); // http initialize with header
            $client = new Client(['headers' => [
                'Content-type' => 'application/json; charset=UTF-8'
            ]]); // http initialize with header

            $response = $client->post('https://api.ggtasker.co.uk/user/login', ['form_params' => $data]); // api call & pass data as body
            if($response && $response->getBody() && $response->getBody()->getContents()) {
                return json_decode($response->getBody()->getContents());
            }
            return null;
        } else {
            return null;
        }
    }

    /**
     * get the request token that needs to pass in every api
     */
    public function requestForToken($data)
    {
        $client = new Client(['headers' => [
            'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E'
        ]]); // http initialize with header

        $response = $client->post('https://api.ggtasker.co.uk/user/request_token', ['form_params' => $data]); // api call & pass data as body

        if ($response && $response->getBody() && $response->getBody()->getContents()) {
            $respondedData = json_decode($response->getBody()->getContents());
            session(['X-Token' => $respondedData->token]); // store into session for future use
            session()->save();
            return $respondedData->token;
        }
        return null;
    }
}
