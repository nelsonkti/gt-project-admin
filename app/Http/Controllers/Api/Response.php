<?php


namespace App\Http\Controllers\Api;

use Dingo\Api\Http\Response\Factory as BaseResponse;

class Response extends BaseResponse
{
    /**
     * 资源已被永久性转移
     *
     * @param string $location 资源被转移到的位置
     * @return \Dingo\Api\Http\Response
     */
    public function permanentlyMoved($location)
    {
        return $this->array([
            'meta' => [
                'location' => $location
            ]
        ])->setStatusCode(301);
    }

    /**
     * 资源已被暂时性转移
     *
     * @param string $location 资源被转移到的位置
     * @return \Dingo\Api\Http\Response
     */
    public function temporarilyMoved($location)
    {
        return $this->array([
            'meta' => [
                'location' => $location
            ]
        ])->setStatusCode(302);
    }

    /**
     * 请求实体无法处理，一般用于表单验证失败
     *
     * @param string $message 异常信息
     */
    public function errorUnprocessableEntity($message = '表单验证失败')
    {
        $this->error($message, 422);
    }

    /**
     * 资源暂时未准备好，要求请求方暂时不访问资源，如果可以，返回消息中可以包含可以正常访问资源的时间
     *
     * @param string $message 异常信息
     */
    public function errorNotReady($message = '资源未准备好')
    {
        $this->error($message, 503);
    }
}