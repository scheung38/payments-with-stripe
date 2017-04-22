<template>
     
    <form action="/purchases" method="POST">

        <input type="hidden" name="stripeToken" v-model="stripeToken">

        <input type="hidden" name="stripeEmail" v-model="stripeEmail">
        
        <button type="submit" @click.prevent="buy">Buy This Bundle</button>

    </form>  

</template>

<script>

    export default {

        data() {

            return {

                stripeEmail: '',

                stripeToken: ''

            };
        },


        created() {

            this.stripe = StripeCheckout.configure({

            key: Laracasts.stripeKey,
        
            image: "https://stripe.com/img/documentation/checkout/marketplace.png",
        
            locale: "auto",

            token: (token) => {
                
                this.stripeToken = token.id;

                this.stripeEmail = token.email;

                axios.post('/purchases', this.$data).then(response => alert('Complete! Thanks for your payment!'));
            }
        });

    },


    methods: {

        buy() {

             this.stripe.open({

                        name: 'My Bundle One',

                        description: 'New Some details about this bundle.',

                        zipCode: true,

                        amount: 2100

                    });


        }
    }
 
}
</script>
