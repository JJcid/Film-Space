<template>
    <stripe-checkout
        button="Suscribirme"
        buttonClass="btn btn-film"
        :stripe-key="stripe_key"
        :product="product"
        >
    </stripe-checkout>
</template>

<script>
    import { StripeCheckout } from 'vue-stripe'

    export default {
        name: "StripeForm",
        props: {
            stripe_key: '',
            name: '',
            amount: '',
            description: ''
        },
        computed: {
            product() {
                return {
                    name: this.name,
                    amount: parseFloat(this.amount),
                    description: this.description,
                }
            }
        },
        components: {
            StripeCheckout
        }
    }
</script>

<style scoped>

</style>
