<?php

namespace Mahmud\GglinkTest\Repository;

use GuzzleHttp\Client;

class UserRepository
{
    /**
     * get profile user
     */
    public function show()
    {
        $client = new Client(['headers' => [
            'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E',
            'X-Token' => session('X-Token')
        ]]); // http initialize with header

        $response = $client->get('https://api.ggtasker.co.uk/user/profile'); // api call to get user
        if($response && $response->getBody() && $response->getBody()->getContents()) {
            return json_decode($response->getBody()->getContents()); // get result from api
        }
        return null;
    }

    /*
     * add a user
     * api call & pass the data to post method
     * get response
     */
    public function store($data)
    {
        $client = new Client(['headers' => [
            'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E',
            'X-Token' => session('X-Token')
        ]]); // http initialize with header

        $response = $client->post('https://api.ggtasker.co.uk/user/add', ['form_params' => $data]); // api call & pass data as body
        if($response && $response->getBody() && $response->getBody()->getContents()) {
            return json_decode($response->getBody()->getContents()); // get result from api
        }
        return null;
    }

    /**
     * update profile data of logged user
     */
    public function update($data)
    {
        $client = new Client(['headers' => [
            'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E',
            'X-Token' => session('X-Token')
        ]]); // http initialize with header

        $response = $client->post('https://api.ggtasker.co.uk/user/update', ['form_params' => $data]); // api call & pass data as body
        if($response && $response->getBody() && $response->getBody()->getContents()) {
            return json_decode($response->getBody()->getContents()); // get result from api
        }
        return null;
    }

    /**
     * delete an user
     */
    public function destory($data)
    {
        $client = new Client(['headers' => [
            'X-API-KEY' => 'AF0F56B4962DB226607A4C83F41CAF7E',
            'X-Token' => session('X-Token')
        ]]); // http initialize with header

        $response = $client->post('https://api.ggtasker.co.uk/user/delete', ['form_params' => $data]); // api call & pass data as body
        if($response && $response->getBody() && $response->getBody()->getContents()) {
            return json_decode($response->getBody()->getContents()); // get result from api
        }
        return null;
    }
}
