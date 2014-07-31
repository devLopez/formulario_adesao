Esta função vai complementar a função nativa do CodeIgniter, o base_url, adicionando 'index.php?/' na url solicitada

Este helper possui apenas uma função:

* app_baseurl()
	* Adiciona o 'index.php?/' na url solicitada

```
    /**
     * appbaseurl_helper.php
     * 
     * @author      José Aparecido Rocha <cidjarc@gmail.com>
     * @abstract    Esta função vai complementar a função nativa do CodeIgniter,
     *              o base_url, adicionando 'index.php?/' na url solicitada
     */
    
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    
    if(!function_exists('app_baseurl'))
    {
        function app_baseurl()
        {
            return base_url().'index.php?/';
        }
    }
    /** End of File appbaseurl_helper.php **/
    /** Location ./application/helpers/appbaseurl_helper.php **/