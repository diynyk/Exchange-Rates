# EXCHANGE-RATES

## What is EXCHANGE-RATES?
This project is used to send the current exchange rate multiplied by the required percentage in Bitrix.

## How to use it
**PHP_VER**:
* 7.2
* 7.3
* 7.4
* 8.0
#### All commands should start with :
`docker run --rm dezar/exchange-rates:PHP_VER ` 

#### To call for help :
`docker run --rm dezar/exchange-rates:PHP_VER help`

#### To access help for all available commands:
`docker run --rm dezar/exchange-rates:PHP_VER  list`

#### Exchange rate command:
`docker run --rm dezar/exchange-rates:PHP_VER  set:rates rest-endpoint, user-id, user-token, currency, factor`
 
* currency - required currency (USA, EUR)
* factor - official rate percentage factor

### Example :
`docker run --rm dezar/exchange-rates:PHP_VER  set:rates rest-endpoint user-id user-token EUR 5`




