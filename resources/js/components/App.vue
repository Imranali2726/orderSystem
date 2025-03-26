<template>
    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>
        <form>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="from-group">
                        <input class="form-control" v-model="name" placeholder="Product Name"/>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <input class="form-control" v-model="price" placeholder="Product Price"/>
                    </div>

                </div>
                <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-success" @click="addProduct">Add Product</button>
                </div>
            </div>
        </form>

        <div class="row mt-2">
            <div class="col-md-4 mb-3" v-for="product in products" :key="product.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">${{ product.price }}</p>
                        <button class="btn btn-primary" @click="addToCart(product)">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Cart</h2>
        <div class="list-group mb-4">
            <div class="list-group-item" v-for="item in cart" :key="item.product.id">
                {{ item.product.name }} x {{ item.quantity }}
            </div>
        </div>

        <div class="mb-3">
            <input class="form-control" v-model="customerName" placeholder="Your Name"/>
        </div>
        <button class="btn btn-success" @click="checkout">Checkout</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            price: '',
            products: [],
            cart: [],
            customerName: ''
        };
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data;
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    alert('Failed to load products');
                });
        },
        addProduct() {
            axios.post('/api/product/store', {
                name: this.name,
                price: this.price,
            }).then(() => {
                alert('Product saved successfully!');
                this.name = '';
                this.price = '';
                this.getProducts();
            })
                .catch((error) => {
                    alert('Error saving product');
                    console.error(error);
                });
            ;
        },
        addToCart(product) {
            const existing = this.cart.find(item => item.product.id === product.id);
            if (existing) {
                existing.quantity++;
            } else {
                this.cart.push({product, quantity: 1});
            }
        },
        checkout() {
            const items = this.cart.map(item => ({
                product_id: item.product.id,
                quantity: item.quantity
            }));

            axios.post('/api/checkout', {
                customer_name: this.customerName,
                items
            }).then(() => {
                alert('Order placed!');
                this.cart = [];
                this.customerName = '';
            });
        }
    }
};
</script>

<style scoped>
body {
    font-family: Arial, sans-serif;
}
</style>
