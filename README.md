<div align='center'>

# Bkash Payment Gatway Integration in Laravel
</div>

Then are some types of bKash Integration. Here we used `Tokenized solution`.

## Step-1 : Registration
First of all you need a marchant account and then need to register your website there.

- Visit Website :  https://pgw-integration.bkash.com


<img src="https://snipboard.io/N7BqGZ.jpg">


- Setup Account Info

<img src="https://snipboard.io/fwN42A.jpg">


- Product Request

<img src="https://snipboard.io/2gfH5L.jpg">

- Product List

<img src="https://snipboard.io/6TOp1h.jpg">

- Overview

<img src="https://snipboard.io/39zEhD.jpg">


## Step-2 : Sandbox Validation
First of all follow the developer documentation.


Visit the link : https://developer.bka.sh/docs/tokenized-checkout-overview


Our Sandbox Credentials will be look like that - 
<img src="https://snipboard.io/lRGLNS.jpg">



### 1. [Grand Token ](https://developer.bka.sh/docs/grant-token-1)

Request URL: `{base_URL}/tokenized/checkout/token/grant`
Here the base_URL will be - `https://tokenized.sandbox.bka.sh/v1.2.0-beta/`

Now follow the screenshot given below -

<img src="https://snipboard.io/yhFaTi.jpg">

in POSTMAN - 

Headers
<img src="https://snipboard.io/vymjuI.jpg">

Body
<img src="https://snipboard.io/Mm32FI.jpg">

Response Result - 

<img src="https://snipboard.io/XAGOzV.jpg">

### 2. [Create Payment](https://developer.bka.sh/docs/create-payment-2)

Follow the format -

```bash
POST /tokenized/checkout/create HTTP/1.1
Host: {base_URL}
Content-Type: application/json
Accept: application/json
authorization: id_token
x-app-key: x-app-key

{  
   "mode": "0011",
   "payerReference": "01723888888",
   "callbackURL": "yourDomain.com",
   "merchantAssociationInfo": "MI05MID54RF09123456One"
   "amount": "500",
   "currency": "BDT",
   "intent": "sale",
   "merchantInvoiceNumber": "Inv0124"
}
```

in Postman - 

Header -
<img src="https://snipboard.io/lUSMzX.jpg">

Body - 
<img src="https://snipboard.io/1CYhKN.jpg">

Response
<img src="https://snipboard.io/vOhsuy.jpg">


### 3. [Execute Payment](https://developer.bka.sh/docs/execute-payment-2)


First copy the `bKashURL` and then goto the link and make payment from their site first -  

For an example, sample link look like- 

```bash
https://sandbox.payment.bkash.com/?paymentId=TR0011hEN7KTZ1718449546941&hash=)gqMffGT.r.4*dLWGcc)mE_6q9U)wmmh9SI6hTlkjzNc!IFGOZZCN5Fe1I0FGRtIXxl!sNdP00LAv)mjDLg6iu8cAKr**0g(WHZC1718449546941&mode=0011&apiVersion=v1.2.0-beta/
```

<img src="https://snipboard.io/EKVyDB.jpg">

<img src="https://snipboard.io/GuQt13.jpg">

<img src="https://snipboard.io/zKxSnM.jpg">

<img src="https://snipboard.io/toBdAw.jpg">


<br>

After creating the payment, now goto postman and follow the format -

```bash
POST /tokenized/checkout/execute HTTP/1.1
Host: {base_URL}
Accept: application/json
authorization: id_token
x-app-key: x-app-key

{
	"paymentID" : "TR0011ON1565154754797"
}
```


in Postman - 

Header -
<img src="https://snipboard.io/CqiEw8.jpg">

Body - 
<img src="https://snipboard.io/r30Zwv.jpg">

Response
<img src="https://snipboard.io/v7feu0.jpg">


### 4. Verify Sandbox Validation

Create Payment Sandbox Test

<img src="https://snipboard.io/uvwAdr.jpg">


Execute Payment Sandbox Test

<img src="https://snipboard.io/3BHItK.jpg">

Success Output

<img src="https://snipboard.io/07Rre1.jpg">


### 5. Live Credentials

After doing all these, finally you will get the Live Credentials. 

<img src="https://snipboard.io/XnYxW4.jpg">


## Step-3 : Setup the bkash credentials in your site

### `.ENV`

Put the value in .env file -

```bash
# Sandbox Credentials
APP_URL=your_root_domain
BKASH_TOKENIZE_SANDBOX=true
BKASH_TOKENIZE_BASE_URL=https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized
BKASH_TOKENIZE_VERSION="v1.2.0-beta"
BKASH_TOKENIZE_APP_KEY=your_sandbox_app_key
BKASH_TOKENIZE_APP_SECRET=your_sandbox_app_secret
BKASH_TOKENIZE_USER_NAME=01XXXXXXXXX
BKASH_TOKENIZE_PASSWORD=your_sandbox_app_password


# Live Credentials
# APP_URL=your_root_domain
# BKASH_TOKENIZE_SANDBOX=false
# BKASH_TOKENIZE_BASE_URL=https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized
# BKASH_TOKENIZE_VERSION="v1.2.0-beta"
# BKASH_TOKENIZE_APP_KEY=your_live_app_key
# BKASH_TOKENIZE_APP_SECRET=your_live_app_secret
# BKASH_TOKENIZE_USER_NAME=01XXXXXXXXX
# BKASH_TOKENIZE_PASSWORD=your_live_app_password
```

### Try to run in the app

1. Please type on the url `your-domain.com/payment/checkout`

This is the bkash page. Click on the pay now button.

<img src="https://snipboard.io/dKf8e1.jpg">

<img src="https://snipboard.io/EKVyDB.jpg">

<img src="https://snipboard.io/GuQt13.jpg">

<img src="https://snipboard.io/zKxSnM.jpg">

<img src="https://snipboard.io/toBdAw.jpg">



After Payment done - 

<img src="https://snipboard.io/3AFmOR.jpg">



## References 
- [Bkash Sandbox API Validation](https://www.youtube.com/watch?v=BbuwRxipIY4)
- [Tokenized Developer Docs](https://developer.bka.sh/docs/tokenized-checkout-overview)
