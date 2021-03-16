# EXCHANGE-RATES

## What is EXCHANGE-RATES?
This project is used to send the current exchange rate multiplied by the required percentage in Bitrix.

## How to use it
#### All commands should start with :
`./fixer` 

#### To call for help :
`docker run --rm dezar/exchange-rates:7.2 help`

#### To access help for all available commands:
`./fixer list`

#### Exchange rate command:
`./fixer set:rates rest-endpoint, user-id, user-token, currency, factor`
 
* currency - required currency (USA, EUR)
* factor - official rate percentage factor

### Example :
`./fixer set:rates rest-endpoint user-id user-token EUR 5`




