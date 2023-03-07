<?php

/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

Postmon é uma API para consultar CEP e encomendas de maneira fácil.

Implemente uma função que recebe CEP e retorna todos os dados reltivos ao endereço correspondente.

Exemplo:

getAddressByCep('13566400') retorna:
{
	"bairro": "Vila Marina",
	"cidade": "São Carlos",
	"logradouro": "Rua Francisco Maricondi",
	"estado_info": {
	"area_km2": "248.221,996",
	"codigo_ibge": "35",
		"nome": "São Paulo"
	},
	"cep": "13566400",
	"cidade_info": {
		"area_km2": "1136,907",
		"codigo_ibge": "3548906"
	},
	"estado": "SP"
}



Documentação:
https://postmon.com.br/


*/

class CEP
{
    public static function getAddressByCep(string $cep)
    {
		$options = ['http' =>
			[
				'method'  => 'GET',
				'header'  => 'Content-type: application/json',
			]
		];
		
		$context = stream_context_create($options);
	;
		try {
			$response = json_encode(file_get_contents("https://api.postmon.com.br/v1/cep/$cep", false, $context));
		} catch(Exception $e) {
			if ($e->getCode() === 404) {
				throw new Exception("Pagina não encontrada!!", 404);
			}
		}

		return $response;
    }
}

$cep = '01311000';
var_dump(CEP::getAddressByCep('01311000'));
