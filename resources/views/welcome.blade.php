<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    
    <body>
       
       <!-- <h1>Buy My Item</h1> -->

      <form id="checkout-form" action="/purchases" method="POST">

        {{ csrf_field() }}

        <input type="hidden" name="stripeToken" id="stripeToken">

        <input type="hidden" name="stripeEmail" id="stripeEmail">
        
        <button type="submit">Buy My Book</button>

          <!-- <script

            src="https://checkout.stripe.com/checkout.js" class="stripe-button"

            data-key="{{ config('services.stripe.key') }} "
            
            data-amount="2500"
            
            data-name="Dellvo"
            
            data-description="This'll give you everything you need."
            
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            
            data-locale="auto"

            data-zip-code="true">
          
          </script> -->
        
        </form>  
 
<script src="https://checkout.stripe.com/checkout.js"></script>

<script>

    let stripe = StripeCheckout.configure({

        key: "{{ config('services.stripe.key') }}",
        
        image: "https://stripe.com/img/documentation/checkout/marketplace.png",
        
        locale: "auto",

        token: function (token) {
            document.querySelector('#stripeEmail').value = token.email;
            
            document.querySelector('#stripeToken').value = token.id;

            document.querySelector('#checkout-form').submit();   
        }
    });


    document.querySelector('button').addEventListener('click', function(e) {
 
        stripe.open({

            name: 'My Book',

            description: 'Some details about the book.',

            zipCode: true,

            amount: 99

        });

        e.preventDefault();

    });

   


</script>



    </body>
</html>
